<?php

namespace Examples\SpatieActivityLog;

use Closure;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
    protected static $activityGroup = [];

    public static function boot()
    {
        parent::boot();
        
        static::saving(function($activity) {
            $activity->group = $activity::getActivityGroup();
        });
    }

    public static function setActivityGroup(string $group)
    {
        static::$activityGroup[] = $group;
    }

    public static function getActivityGroup()
    {
        return static::$activityGroup[0] ?? null;
    }

    public static function resetActivityGroup()
    {
        static::$activityGroup = [];
    }

    public static function log(Closure $closure) {
        static::setActivityGroup(Str::random(12));

        // Try with only finally block
        // We dont want to catch exceptions, we only have to ensure that activity group will be popped out of array
        try {
            $closure();
        } finally {
            array_pop(static::$activityGroup);
        }
    }
}
