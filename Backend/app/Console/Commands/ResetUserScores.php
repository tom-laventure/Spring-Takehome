<?php

namespace App\Console\Commands;

use App\Models\UserScore;
use Illuminate\Console\Command;

class ResetUserScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:scores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset points values in user_scores to 0';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        UserScore::query()->update([
            'points' => 0
        ]);
    }
}