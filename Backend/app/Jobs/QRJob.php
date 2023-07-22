<?php

namespace App\Jobs;

use App\Models\UserScore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class QRJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public UserScore $userScore)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $QRCode = 'https://api.qrserver.com/v1/create-qr-code/?data=' . $this->userScore->address . '&size=150x150';

        \Log::info('QR Code: ' . $QRCode);

        $this->userScore->update(['QR_code' => $QRCode]);
    }
}