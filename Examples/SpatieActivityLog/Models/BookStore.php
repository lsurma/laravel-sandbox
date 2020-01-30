<?php

namespace Examples\SpatieActivityLog;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BookStore extends Model
{
    use LogsActivity;

    protected $fillable = ['name'];

    // Activity log settings
    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['updated_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function books()
    {
        return $this->hasMany(Book::class, 'store_id');
    }
}
