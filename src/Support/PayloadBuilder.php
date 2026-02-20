<?php

namespace TechContributors\LogPulse\Support;

class PayloadBuilder
{
    public static function build(
        string $action,
        string $resource,
        array $meta,
        ?int $appUserId
    ): array {

        return [
            'action' => $action,
            'resource' => $resource,
            'app_user_id' => $appUserId,
            'meta' => $meta,
            'ip' => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'created_at' => now()->toIso8601String(),
        ];
    }
}