<?php

namespace App\Jobs;

use App\Models\UserScore;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckHighestScoreWinner implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $highestScorer = UserScore::orderByDesc('points')->first();

        $tieUsers = UserScore::where('points', $highestScorer->points)
            ->count();

        if ($tieUsers > 1) {
            return;
        }

        $winner = new Winner();
        $winner->user_id = $highestScorer->id;
        $winner->points = $highestScorer->points;
        $winner->won_at = Carbon::now();
        $winner->save();
    }
}
