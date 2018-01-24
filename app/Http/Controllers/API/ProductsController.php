<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Hash;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\User;
use App\Models\Country;
use Session;

class ProductsController extends Controller
{
    public $show_action = true;
   
    public function __construct() {
        // Field Access of Listing Columns
        
    }
       
    public function productCategory(){
        $categories = DB::table('categories')->where(['active' => 'yes'])->select('id', 'name')->get();
        if(count($categories) > 0){
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $categories,
                'message' => '',
            );  
        }
        else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'No Category',
            );
        }     
        return Response()->json($response);    
    }

    public function productList(Request $request){
        $cat_id = $request->input('cat_id');
        $products = DB::table('products')->where(['category_id' => $cat_id])->select('*')->get();
        if(count($products) > 0){
          $response = array(
                'status' => 'success',
                'status_code' => 200,
                'data' => $products,
                'message' => '',
            );  
        }
        else{
             $response = array(
                'status' => 'failure',
                'status_code' => 401,
                'data' => '',
                'message' => 'No Category',
            );
        }     
        return Response()->json($response);    
    }
   


}
