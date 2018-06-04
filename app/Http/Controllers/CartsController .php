<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
//use Illuminate\Http\Event;
use App\Models\User;
use App\Models\Event;
use App\Models\Cart;
use Auth;
use DB;
use Session;

class CartsController extends Controller
{
    public function __construct()
    {
      parent::__construct();
    }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function addtocart(Request $request){ 
    echo "dfdsfds";
    die; 
            /*$user=Auth::user();      
            $product_id = $request->input('product_id');
            $quantiety = $request->input('quantiety');
            $user_id = $user->id;
        
       
           $data['user_id'] = $user_id;
           $data['product_id'] = $product_id;
           $data['quantiety'] = $quantiety;
           $cart=carts::create($data);
           $insertedId = $cart->id; 

           return  redirect()->action('CartController@cartlist')->withMessage("Product add successfully.");*/
    }

    public function cartlist(){
        echo "Test";
        die;
    }

    
}
