<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
    	'user_id', 'dob', 'gender', 'profile'
    ];

    public function users(){
    	return $this->belongsTo(User::class);
    }
}
