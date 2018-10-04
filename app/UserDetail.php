<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
    	'user_id',
    	'related_user_id',
    ];

    public function user ()
    {
    	return $this->belongsTo('App\User');
    }
}
