<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class  FieldProcessings extends Model
{
    protected $fillable = [
    	'processing_id', 'tractor_id', 'field_id', 'date', 'area', 'status'
    ];
    
    
    /* Field Processong Reports
      @pram $filed_id int,
      @pram $culture text,
      @pram $date date,
      @pram $tractor int,
      retun mixed
     */
    public static function reports($filed_id='', $culture='', $date='', $tractor='')
    {
		
        $condition = 'field_processings.status = 1';
        if($filed_id != '')
        {
            $condition .=' and field_processings.field_id = '.$filed_id;
        }
        if($culture != '')
        {
            $condition .=" and fields.type_of_crops LIKE '%".$culture."%'";
        }
        if($date != '')
        {
            $condition .=" and field_processings.date LIKE '%".$date."%'";
        }
        
        if($tractor != '')
        {
            $condition .=' and field_processings.tractor_id = '.$tractor;
        }
        $processings = DB::table('field_processings')
                        ->select('field_processings.tractor_id as processings_tractor_id', 'field_processings.field_id as processings_field_id', 'field_processings.area as processings_area','field_processings.date','fields.name','fields.area as field_area','fields.type_of_crops','tractors.tractor_name','tractors.tractor_id','fields.field_id')
                        ->join('fields','fields.field_id','=','field_processings.field_id')
                        ->join('tractors','tractors.tractor_id','=','field_processings.tractor_id')
                        ->whereRaw($condition)
                        ->get();
        return $processings;
    }

}
