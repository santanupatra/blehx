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
use Config;
use Auth;
use DB;
use URL;
use View;
use Mail;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class  HomeController  extends Controller
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
    public function index()
    {
      return view('Homes/index');
        /*$roleCount = \App\Role::count();
		if($roleCount != 0) {
			if($roleCount != 0) {
                        $all_banners=Banner::with('bannerpath')->get();    
                        foreach ($all_banners as  $banner)
                        {
                            $filepath=$banner->bannerpath->path;
                            $img_path=Config::get('constants.IMGPATH');
                            $banner->bannerpath->path=$img_path.pathinfo($filepath, PATHINFO_BASENAME);
                            $banners[]=$banner;
                        }
                       
                        $campaigns=Campaign::with('imgpath')
                                ->with("user")
                                ->with("profilephoto")
                                ->with("category")
                                ->whereNull('deleted_at')
                                ->where("photo",">",0)
                                 ->where("end_date",">=",gmdate('Y-m-d'))
                                ->orderBy('id','desc')->skip(0)->take(8)->get();
                        $campaigns = collect($campaigns)->map(function($item)
                                            {  
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
                                            $num_donation = DB::table('donations')
                                                ->where('is_paid', 1)
                                                ->where('campaign_id', $item->id)
                                                ->whereNull('deleted_at')
                                                ->count();
                                            $img_path=Config::get('constants.IMGPATH');
                                            $item->cat_name=$item->category->name;
                                            $item->username=$item->user->first_name.' '.$item->user->last_name;
                                            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
                                            $item->num_donation=$num_donation;
                                            return $item;
                                            });
//                                            echo "<pre>";
//                                            print_r($campaigns);
//                                            exit;
                                            
                        $charities=User::with('imgpath')
                                       ->whereNull("deleted_at")
                                       ->where("type","=",'C')
                                       ->where("is_active","=",1)
                                       ->get();
                        
                        $charities = collect($charities)->map(function($item)
                        { 
                           $img_path=Config::get('constants.IMGPATH');
                            if(!empty($item->imgpath))
                            {
                                $item->campimg=$img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
                            }
                            else
                            {
                                $item->campimg=$img_path.'noimage.png';
                            }
                            return $item;

                        });
//                        echo "<pre>";
//                        print_r($charities);
//                        exit;
                        $total_charity=User::with('imgpath')
                                       ->whereNull("deleted_at")
                                       ->where("type","=",'C')
                                       ->where("is_active","=",1)
                                       ->count();
			$testiraws=Testimonial::with('user')->whereNull("deleted_at")->get();
                        foreach ($testiraws as $testimonial)
                        {
                            $img_path=Config::get('constants.IMGPATH');
                            $user=User::with('imgpath')->whereNull("deleted_at")->where("id","=",$testimonial->user_id)->first();
                            if(!empty($user->imgpath))
                            {
                                $user_img=$img_path.pathinfo($user->imgpath->path, PATHINFO_BASENAME);
                            }
                            else
                            {
                                $user_img=$img_path.'nouser.png';
                            }
                           
                            @$testimonials[]=array(
                            "title"=>$testimonial->title,"description"=> $testimonial->description,"username"=> $testimonial->user->name,
                            "user_image"=>$user_img,    
                            );
                        }
                       
                        
                       
                        
                        return view('home',["total_charity"=>$total_charity,'banners'=>$banners,"campaigns"=>$campaigns,"img_path"=>$img_path,"testimonials"=>$testimonials,"charities"=>$charities]);
			}
		} else {
			return view('err5 321`ors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}*/
    }
}