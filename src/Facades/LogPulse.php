<?php

namespace TechContributors\LogPulse\Facades;

use Illuminate\Support\Facades\Facade;

class LogPulse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'log-pulse';
    }
}