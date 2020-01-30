<?php

namespace Examples\SpatieActivityLog;

use Closure;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
    protected static $activityGroup = null;

    public static function boot()
    {
        parent::boot();
        
        static::saving(function(self $activity) {
            // Save activity group if exists
            $activity->group = $activity::$activityGroup;
        });
    }

    public static function setActivityGroup(string $group)
    {
        if(static::$activityGroup !== null || !empty(static::$activityGroup)) {
            return;
        }

        static::$activityGroup = $group;
    }

    public static function resetActivityGroup()
    {
        static::$activityGroup = null;
    }

    public static function log(Closure $closure) {
        static::setActivityGroup(Str::random(12));
        $closure();
        static::resetActivityGroup();
    }
}
