<?php

namespace TechContributors\LogPulse;

use TechContributors\LogPulse\Jobs\SendLogPulseJob;
use TechContributors\LogPulse\Support\PayloadBuilder;

class LogPulse
{
    public function log(
        string $action,
        string $resource,
        array $meta = [],
        ?int $appUserId = null
    ): void {

        if (!config('log-pulse.enabled') || !config('log-pulse.api_key')) {
            return;
        }

        $payload = PayloadBuilder::build(
            $action,
            $resource,
            $meta,
            $appUserId ?? auth()->id()
        );

        if (config('log-pulse.queue')) {
            dispatch(new SendLogPulseJob($payload));
        } else {
            SendLogPulseJob::dispatchSync($payload);
        }
    }
}