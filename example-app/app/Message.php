<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Predis;
use App\User;

class Message extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
