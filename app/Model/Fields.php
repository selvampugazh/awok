<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
	protected $primaryKey = 'field_id';
    protected $fillable = [
    	'field_id', 'name', 'type_of_crops', 'area'
    ];

}
