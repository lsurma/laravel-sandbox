<?php

namespace Examples\SpatieActivityLog;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Book extends Model
{
    use LogsActivity;

    protected $fillable = ['name'];

    // Activity log settings
    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['updated_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;
}
