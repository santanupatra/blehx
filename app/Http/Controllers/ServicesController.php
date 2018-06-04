<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use Illuminate\Http\Event;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Seller_Service;

use Auth;
use DB;
use Session;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function allservice(){
       
        
        $bitcoins = DB::table('seller_services')
                            ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                            ->join('services', 'services.id', '=', 'seller_services.service_id')
                            ->join('users', 'seller_services.user_id', '=', 'users.id')    
                            ->where(['seller_services.is_active'=>'Y', 'service_categories.name' => 'Bitcoin'])->select('services.*', 'seller_services.price', 'seller_services.id as sp_id', 'users.name as uname', 'service_categories.name as cat_name', 'service_categories.hashrate_type')->get(); 

        $litecoins = DB::table('seller_services')
                            ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                            ->join('services', 'services.id', '=', 'seller_services.service_id')
                            ->join('users', 'seller_services.user_id', '=', 'users.id')    
                            ->where(['seller_services.is_active'=>'Y', 'service_categories.name' => 'Litecoin'])->select('services.*', 'seller_services.price', 'seller_services.id as sp_id', 'users.name as uname', 'service_categories.name as cat_name', 'service_categories.hashrate_type')->get();

        $ethereums = DB::table('seller_services')
                            ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                            ->join('services', 'services.id', '=', 'seller_services.service_id')
                            ->join('users', 'seller_services.user_id', '=', 'users.id')    
                            ->where(['seller_services.is_active'=>'Y', 'service_categories.name' => 'Ethereum'])->select('services.*', 'seller_services.price', 'seller_services.id as sp_id', 'users.name as uname', 'service_categories.name as cat_name', 'service_categories.hashrate_type')->get();

        return view('Services/allservice', ['bitcoins' => $bitcoins, 'litecoins' => $litecoins, 'ethereums' => $ethereums]); 
    }

    public function service_details($id){
        $user=Auth::user();  
        $user_id = $user->id;
      
        $details = DB::table('seller_services')
                            ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                            ->join('services', 'services.id', '=', 'seller_services.service_id')
                            ->join('users', 'seller_services.user_id', '=', 'users.id')    
                            ->where(['seller_services.is_active'=>'Y', 'seller_services.id' => $id])->select('services.*', 'seller_services.price', 'seller_services.id as sp_id', 'users.name as uname', 'service_categories.name as cat_name', 'service_categories.hashrate_type')->first();
            //print_r($details);                
       return view('Services/service_details', ['details' => $details]);                    
    }

    public function create()
    {
        $category = DB::table('service_categories')->where(['active' => 'yes', 'deleted_at' => null])->select('id', 'name')->get();       
        return view('Services/create', ['category' => $category]);   
    }

    public function store(Request $request)
    {
        
        $user=Auth::user();  
        $user_id = $user->id;       
        $price = $request->input('price');
        $category_id = $request->input('category_id');
        $service_id = $request->input('service_id');        

        if(!empty($request->input('id'))){
            DB::table('seller_services')->where('id', $request->input('id'))->update([
                                        'price' => $price              
                                        ]);
            return  redirect()->action('ServicesController@list')->withMessage("Service edit successfully.");
        }
        else{
            
            $product = Seller_Service::create([
                'user_id' => $user_id,
                'category_id' => $category_id,
                'service_id' => $service_id,
                'price' => $price           
            ]);
             return  redirect()->action('ServicesController@list')->withMessage("Service add successfully.");      
        }
    }

     public function list(){
        $user=Auth::user();  
        $user_id = $user->id;
        $lists = DB::table('seller_services')
                            ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                            ->join('services', 'services.id', '=', 'seller_services.service_id')
                            ->where('user_id', $user_id)->select('services.*', 'seller_services.id as sp_id', 'seller_services.*', 'service_categories.hashrate_type', 'service_categories.name as cat_name')->get();  
                         
        return view('Services/list', ['lists' => $lists]); 
    }

    public function delete($id){
        $user=Auth::user();  
        $user_id = $user->id;
        $lists = DB::table('seller_services')->where('id', $id)->delete();                            
        return  redirect()->action('ServicesController@list')->withMessage("Product delete successfully.");
    }

     public function edit($id)
    {
        $service = DB::table('seller_services')
                        ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                        ->join('services', 'services.id', '=', 'seller_services.service_id')
                        ->where('seller_services.id', $id)->select('service_categories.name as cat_name','service_categories.hashrate_type', 'services.name as pro_name', 'services.hashrate', 'seller_services.*')->first();   
                  
        return view('Services/edit', ['service' => $service]);          
    }

    public function servicelist(Request $request){
        $category_id = $request->input('category_id');
        $services = DB::table('services')
                    ->where(['category_id' => $category_id, 'services.deleted_at' => NULL])->select('services.*')->get();
          $html ='<option value="">Select Service</option>';
        if(count($services) > 0){
            foreach ($services as $service) {
              $html .= '<option value="'.$service->id.'">'.$service->name.'</option>';
            }
          $response = array('Ack' => 1, 'services' => $html);
        }
        else{
          $response = array('Ack' => 1);
        }
        echo json_encode($response);
        //return Response()->json($response); 
    }
    public function details($id){

        /*$service = DB::table('services')
                    ->join('service_categories','services.category_id','=','service_categories.id')
                    ->where(['services.id' => $id])->select('services.*', 'service_categories.name')->first();*/

        $details = DB::table('seller_services')
                ->join('service_categories', 'service_categories.id', '=', 'seller_services.category_id')
                ->join('services', 'services.id', '=', 'seller_services.service_id')
                ->join('users', 'seller_services.user_id', '=', 'users.id')    
                ->where(['seller_services.id'=>$id])->select('services.*', 'seller_services.price', 'seller_services.id as sp_id', 'users.name as uname', 'users.email', 'phone_no', 'service_categories.name as cat_name', 'service_categories.hashrate_type')->first(); 
        print_r($details);           
       return view('Services/details', ['details' => $details]);
    }
    /*public function delete($id){
        $user=Auth::user();  
        $user_id = $user->id;
        $lists = DB::table('seller_products')->where('id', $id)->delete();                            
        return  redirect()->action('ProductsController@list')->withMessage("Product delete successfully.");
    }*/
    
}
