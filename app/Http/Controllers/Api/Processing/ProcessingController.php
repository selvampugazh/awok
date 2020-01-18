<?php


namespace App\Http\Controllers\Api\Processing;

use App\Http\Controllers\Controller;
use App\Model\FieldProcessings;
use App\Model\Fields;
use App\Http\Resources\Field\FieldResource;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;
use Toastr;
use Validator;

class ProcessingController extends Controller
{
    /* Filed Processing List */
	public function index(){
        $data = FieldProcessings::all();
        return response()->json(['status' => true, 'message' => 'Field Processings List', 'data' => $data]);
    }
    
    /* Filed Processing Create */
    public function create(Request $request){
		
    	$validator = Validator::make($request->all(),[
    		'tractor_id' => 'required|max:191',
    		'field_id' => 'required|max:191',
    		'date' => 'required',
    		'area' => 'required',
    	]);

    	if($validator->fails()){
    		$errors = collect($validator->messages())->flatten()->toArray();
    		return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
    	}
    	
    	$areaerrors=$this->ProcessAreaValidation($request->area,$request->field_id);
    	if($areaerrors){
			return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $areaerrors]);
		}

    	// Database Operation
    	try {
    		DB::beginTransaction();
    		$fields = new FieldProcessings();
    		$fields->tractor_id = $request->tractor_id;
    		$fields->field_id = $request->field_id;
    		$fields->date = $request->date;
    		$fields->area = $request->area;
    		$fields->created_by = 1;
    		$fields->updated_by = 1;
    		$fields->save();
    		DB::commit();
    	} 
    	catch (Exception $e) {
    		DB::rollback();
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
    	}

    	// Fields Resouce collection Instance.
    	return response()->json(['status' => true, 'message' => 'Processing has been added sucessfully!']);
    }

    /* Filed Processing Area Validation */
    protected function ProcessAreaValidation($area,$field_id){
		
		$field_info = Fields::find($field_id);
		if(isset($field_info))
		{ 
			if($area > $field_info->area){
				return array('area'=>'Enter area which should not exceed the area of the selected field');
			}
		}
        return false;    
    }
    
    /* Filed Processing Report */
    public function reports(Request $request){
        $data = FieldProcessings::reports($request->field_id,$request->culture,$request->date,$request->tractor_id);
        $report_data= array();
        if(!empty($data)){
            foreach($data as $report){
               $report_data[$report->processings_field_id]['field_name'] =  $report->name;
               if(isset($report_data[$report->processings_field_id]['total_amount_processed_area'])){
                 $report_data[$report->processings_field_id]['total_amount_processed_area'] =  $report_data[$report->processings_field_id]['total_amount_processed_area']+$report->processings_area;
               }else {
                  $report_data[$report->processings_field_id]['total_amount_processed_area'] =  $report->processings_area;
               }
               $report_data[$report->processings_field_id]['tractor_name'] =  $report->tractor_name;
               $report_data[$report->processings_field_id]['culture'] =  $report->type_of_crops;
               $report_data[$report->processings_field_id]['date'] =  $report->date;
            }

        }
        return response()->json(['status' => true, 'message' => 'Field Processings Report', 'data' => $report_data]);
    }
 

}
