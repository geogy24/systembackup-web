<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $primaryKey = 'log_id';
    
    /**
     * Get the user that owns the log.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
