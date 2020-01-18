<?php

namespace App;

use App\Model\UserDetails;
use App\Model\UserQuestion;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasMultiAuthApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findForPassport($username)
    {
        return $this->where('mobile', $username)->first();
    }

    public function scopeFindByMobile($query, $mobile){
        return $query->where('mobile', $mobile);
    }

    public function user_details(){
        return $this->hasOne(UserDetails::class)->withDefault();
    }

    public function user_questions(){
        return $this->hasMany(UserQuestion::class);
    }
}
