<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'events_name', 'start_date', 'end_date', 'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
