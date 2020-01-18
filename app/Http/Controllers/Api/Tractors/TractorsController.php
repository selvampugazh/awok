<?php


namespace App\Http\Controllers\Api\Tractors;

use App\Http\Controllers\Controller;
use App\Model\Tractors;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;
use Toastr;
use Validator;

class TractorsController extends Controller
{
    /* Tractor List */
	public function index(){
        $data = Tractors::all();
        return response()->json(['status' => true, 'message' => 'Tractors List', 'data' => $data]);
    }
    
    /* Tractor Create */
    public function create(Request $request){
    	$validator = Validator::make($request->all(),[
    		'tractor_name' => 'required|max:191',
    	]);

    	if($validator->fails()){
    		$errors = collect($validator->messages())->flatten()->toArray();
    		return response()->json(['status' => false, 'message' => 'Validation Errors', 'data' => $errors]);
    	}

    	// Database Operation
    	try {
    		DB::beginTransaction();
    		$fields = new Tractors();
    		$fields->tractor_name = $request->tractor_name;
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
    	return response()->json(['status' => true, 'message' => 'Tractor has been created sucessfully!']);
    }

 
}
