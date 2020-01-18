<?php


namespace App\Http\Controllers\Api\Fields;

use App\Http\Controllers\Controller;
use App\Model\Fields;
use App\Http\Resources\Field\FieldResource;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;
use Toastr;
use Validator;

class FieldsController extends Controller
{
    /* Filed List */
	public function index(){
        $data = Fields::all();
        return response()->json(['status' => true, 'message' => 'Field List', 'data' => $data]);
    }
    

    /* Filed Create */
    public function create(Request $request){
		
    	$validator = Validator::make($request->all(),[
    		'name' => 'required|max:191',
    		'type_of_crops' => 'required|max:191',
    		'area' => 'required',
    	]);

    	if($validator->fails()){
    		$errors = collect($validator->messages())->flatten()->toArray();
    		return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
    	}

    	// Database Operation
    	try {
    		DB::beginTransaction();
    		$fields = new Fields();
    		$fields->name = $request->name;
    		$fields->type_of_crops = $request->type_of_crops;
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
    	return response()->json(['status' => true, 'message' => 'Field has been added sucessfully!']);
    }
}
