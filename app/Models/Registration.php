<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Registration extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id', 'event_id', 'registered_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

