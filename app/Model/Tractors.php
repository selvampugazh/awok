<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tractors extends Model
{
    protected $fillable = [
    	'tractor_id', 'tractor_name'
    ];

}
