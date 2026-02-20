<?php

namespace TechContributors\LogPulse\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendLogPulseJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public $tries = 3;
    public $timeout = 10;

    public function __construct(public array $payload) {}

    public function handle(): void
    {
        try {

            Http::retry(3, 200)
                ->timeout(config('log-pulse.timeout'))
                ->withHeaders([
                    'x-api-key' => config('log-pulse.api_key'),
                    'Accept' => 'application/json',
                ])
                ->post(config('log-pulse.endpoint'), $this->payload)
                ->throw();

        } catch (\Throwable $e) {
            Log::error('LogPulse Failed', [
                'error' => $e->getMessage(),
                'payload' => $this->payload
            ]);
        }
    }
}