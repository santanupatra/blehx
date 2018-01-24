<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Banner;
use App\Models\Campaign;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Site_Setting;
use App\Models\Category;
use App\Models\Donation;
use Config;
use Redirect;
use Auth;
use DB;
use URL;
use View;
use Mail;
use Session;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
               parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */ 
    function index()
    {
      
      $img_path=Config::get('constants.IMGPATH');
      $categories=DB::table('categories')
              ->whereNull("deleted_at")
              ->where('parent_id','=',0)
              ->orderBy('name')
              ->get();  
      
      $fundraise_setting=DB::table("fundraisers")->first();
      $fund_banner=DB::table("uploads")->where("id","=",$fundraise_setting->banner)->first();
      $fundraise_setting->banner=$img_path.pathinfo($fund_banner->path, PATHINFO_BASENAME);
      $footer_banner=DB::table("uploads")->where("id","=",$fundraise_setting->footer_banner)->first();
      $fundraise_setting->footer_banner=$img_path.pathinfo($footer_banner->path, PATHINFO_BASENAME);
      $faqs=DB::table("faqs")->whereNull("deleted_at")->get();
      $testiraws=Testimonial::with('user')->whereNull("deleted_at")->get();
        foreach ($testiraws as $testimonial)
        {
            $user=User::with('imgpath')->whereNull("deleted_at")->where("id","=",$testimonial->user_id)->first();
            if(!empty($user->imgpath))
            {
                $user_img=$img_path.pathinfo($user->imgpath->path, PATHINFO_BASENAME);
            }
            else
            {
                $user_img=$img_path.'nouser.png';
            }

            $testimonials[]=array(
            "title"=>$testimonial->title,"description"=> $testimonial->description,"username"=> $testimonial->user->name,
            "user_image"=>$user_img    
            );
        }
      
      
      
      
      
      return view('Categories/index',["categories"=>$categories,
                  'fundraise_setting'=>$fundraise_setting,'faqs'=>$faqs,"testimonials"=>$testimonials]);

    }
    
    
    function detail(Request $request,$id)
    {
        $category=Category::with('campaigns')  
              ->where('id','=',$id)
              ->first();
        $net_donation=0;
        $net_funduser=0;
        if(!empty($category->campaigns))
        {
            foreach ($category->campaigns as $key=> $campign)
            {
                $total_fundeduser=Donation::where("campaign_id","=",$campign->id)
                                ->where("is_paid","=",1)
                                ->count();
                
                
                $total_donation=Donation::where("campaign_id","=",$campign->id)
                                ->where("is_paid","=",1)
                                ->sum('charity_amount');
                $net_donation=$net_donation+$total_donation;
                $net_funduser=$net_funduser+$total_fundeduser;
                $category->campaigns[$key]->donation=$total_donation;
                $category->campaigns[$key]->total_fundeduser=$total_fundeduser;
                $singlecamp=Campaign::with("user")
                               ->with("profilephoto")
                               ->where("id","=",$campign->id)
                               ->first();
                $img_path=Config::get('constants.IMGPATH');
                
                $category->campaigns[$key]->username=$singlecamp->user->first_name.' '.$singlecamp->user->last_name;
                $category->campaigns[$key]->profile_photo=!empty($singlecamp->profilephoto->path)?$img_path.pathinfo($singlecamp->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
                
                
                
                
            }
            $request->session()->put('selectcategory', $id);

        }
        $category->net_donation=$net_donation;
        $category->net_funduser=$net_funduser;
         return view('Categories/details',["category"=>$category
                  ]);
       
       
    }
    
    function childs($id)
    {
        $categories=Category::where("parent_id","=",$id)->get();
       
        $options="";
        if(!empty($categories))
        {
        foreach ($categories as $category)
        {
            $options.="<option value=".$category->id.">".$category->name."</option>";
        }
        
        
        }
        
        echo $options;
        exit;
    }
    
    function popular()
    {
        $dbquery = Campaign::with('imgpath')
        ->with('user')->with('profilephoto')->with('category')
        ->where("photo",">",0)
        ->whereNull('deleted_at')
        ->where("end_date",">=", gmdate("Y-m-d"))
        ->where("step",">",0)
        ->orderBy("total_favorite","desc");
        $total_live_project=$dbquery->count();
        $campigns = $dbquery->paginate(16);
        $campigns->setCollection(
        $campigns->getCollection()
        ->map(function($item, $key)
        {
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
            $item->username=$item->user->first_name.' '.$item->user->last_name;
            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $item->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($total_donation>0)
            {
                $item->funded=round(($total_donation*100)/$item->goal);
            }
            else
            {
                $item->funded=0;
            }
            $item->category=$item->category->name;
            $how_long_ago=$this->how_long_ago(base64_encode($item->created_at));
            $item->duration=$how_long_ago['duration'];
            $item->duration_type=$how_long_ago['type'];
            return $item;
        })
    );  
        
//     echo "<pre>";
//     print_r($campigns);
//     exit;
     return view('Categories/popular',["campaigns"=>$campigns,'total_live_project'=>$total_live_project]);
        
        
        
    }
    
    function newest()
    {
        $dbquery = Campaign::with('imgpath')
        ->with('user')->with('profilephoto')->with('category')
        ->where("photo",">",0)
        ->whereNull('deleted_at')
        ->where("end_date",">=", gmdate("Y-m-d"))
        ->where("step",">",0)
        ->orderBy("id","desc");
        $total_live_project=$dbquery->count();
        $campigns = $dbquery->paginate(16);
        $campigns->setCollection(
        $campigns->getCollection()
        ->map(function($item, $key)
        {
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
            $item->username=$item->user->first_name.' '.$item->user->last_name;
            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $item->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($total_donation>0)
            {
                $item->funded=round(($total_donation*100)/$item->goal);
            }
            else
            {
                $item->funded=0;
            }
            $item->category=$item->category->name;
            $how_long_ago=$this->how_long_ago(base64_encode($item->created_at));
            $item->duration=$how_long_ago['duration'];
            $item->duration_type=$how_long_ago['type'];
            return $item;
        })
    );  
        
//     echo "<pre>";
//     print_r($campigns);
//     exit;
     return view('Categories/newest',["campaigns"=>$campigns,'total_live_project'=>$total_live_project]);
        
        
        
    }
    
    function ending_soon()
    {
        $dbquery = Campaign::with('imgpath')
        ->with('user')->with('profilephoto')->with('category')
        ->where("photo",">",0)
        ->whereNull('deleted_at')
        ->where("end_date",">=", gmdate("Y-m-d"))
        ->where("step",">",0)
        ->orderBy("end_date","asc");
        $total_live_project=$dbquery->count();
        $campigns = $dbquery->paginate(16);
        $campigns->setCollection(
        $campigns->getCollection()
        ->map(function($item, $key)
        {
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
            $item->username=$item->user->first_name.' '.$item->user->last_name;
            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $item->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($total_donation>0)
            {
                $item->funded=round(($total_donation*100)/$item->goal);
            }
            else
            {
                $item->funded=0;
            }
            $item->category=$item->category->name;
            $how_long_ago=$this->how_long_ago(base64_encode($item->created_at));
            $item->duration=$how_long_ago['duration'];
            $item->duration_type=$how_long_ago['type'];
            return $item;
        })
    );  
        
//     echo "<pre>";
//     print_r($campigns);
//     exit;
     return view('Categories/ending_soon',["campaigns"=>$campigns,'total_live_project'=>$total_live_project]);
        
        
        
    }
    
    function most_funded()
    {
        $dbquery = Campaign::with('imgpath')
        ->with('user')->with('profilephoto')->with('category')
        ->where("photo",">",0)
        ->whereNull('deleted_at')
        ->where("end_date",">=", gmdate("Y-m-d"))
        ->where("step",">",0)
        ->orderBy("total_donation","desc");
        $total_live_project=$dbquery->count();
        $campigns = $dbquery->paginate(16);
        $campigns->setCollection(
        $campigns->getCollection()
        ->map(function($item, $key)
        {
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
            $item->username=$item->user->first_name.' '.$item->user->last_name;
            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $item->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($total_donation>0)
            {
                $item->funded=round(($total_donation*100)/$item->goal);
            }
            else
            {
                $item->funded=0;
            }
            $item->category=$item->category->name;
            $how_long_ago=$this->how_long_ago(base64_encode($item->created_at));
            $item->duration=$how_long_ago['duration'];
            $item->duration_type=$how_long_ago['type'];
            return $item;
        })
    );  
        
//     echo "<pre>";
//     print_r($campigns);
//     exit;
     return view('Categories/most_fund',["campaigns"=>$campigns,'total_live_project'=>$total_live_project]);
        
        
        
    }
    
    function most_backed()
    {
        $dbquery = Campaign::with('imgpath')
        ->with('user')->with('profilephoto')->with('category')
        ->where("photo",">",0)
        ->whereNull('deleted_at')
        ->where("end_date",">=", gmdate("Y-m-d"))
        ->where("step",">",0)
        ->orderBy("total_bakers","desc");
        $total_live_project=$dbquery->count();
        $campigns = $dbquery->paginate(16);
        $campigns->setCollection(
        $campigns->getCollection()
        ->map(function($item, $key)
        {
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
            $item->username=$item->user->first_name.' '.$item->user->last_name;
            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $item->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($total_donation>0)
            {
                $item->funded=round(($total_donation*100)/$item->goal);
            }
            else
            {
                $item->funded=0;
            }
            $item->category=$item->category->name;
            $how_long_ago=$this->how_long_ago(base64_encode($item->created_at));
            $item->duration=$how_long_ago['duration'];
            $item->duration_type=$how_long_ago['type'];
            return $item;
        })
    );  
        
//     echo "<pre>";
//     print_r($campigns);
//     exit;
     return view('Categories/most_backed',["campaigns"=>$campigns,'total_live_project'=>$total_live_project]);
        
        
        
    }
   
       
}