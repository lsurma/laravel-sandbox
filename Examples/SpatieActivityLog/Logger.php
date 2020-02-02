<?php

namespace Examples\SpatieActivityLog;

use Spatie\Activitylog\ActivityLogger;

class Logger extends ActivityLogger
{
    public function log(string $description)
    {
        debug($description);
        return parent::log($description);
    }
}