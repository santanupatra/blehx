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
use App\Models\Favorite;
use App\Models\Category;
use App\Models\Upload;
use App\Models\Rewarditem;
use App\Models\Following;
use Config;
use Redirect;
use DateTime;
use DateTimeZone;
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
class FollowingsController extends Controller
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
     $user=Auth::User();
     /*$is_follow = Following::where('user_id', $user->id)
                    ->whereNull('deleted_at')
                    ->count();*/


    $follow = Following::join('campaigns' , 'campaigns.id' , '=' , 'followings.campaign_id')
                            ->whereNull('followings.deleted_at')
                            ->where('followings.user_id', '=', $user->id)
                            ->groupBy('campaigns.user_id')
                            ->get();
    $is_follow=count($follow);

    $followers=Following::join('campaigns' , 'campaigns.id' , '=' , 'followings.campaign_id')
                            ->whereNull('followings.deleted_at')
                            ->where('campaigns.user_id', '=', $user->id)
                            ->count();

    //echo $followers; die;

    $backed = DB::table('donations')
                ->where('is_paid', 1)
                ->where('user_id', $user->id)
                ->whereNull('deleted_at')
                ->count();

     return view('Following/index',["is_follow"=>$is_follow,"followers"=>$followers,"backed"=>$backed]);
    }

   public function store($user_id,$campign_id,$status) 
    {
        /*$is_follow = Following::where('user_id', $user_id)
                    ->where('campaign_id', $campign_id)
                    ->count();*/
        if($status==0)
            {
                DB::table('followings')
                ->insert(array('user_id'=>$user_id,'campaign_id'=>$campign_id));
                $data["Ack"]=1;
            }
            else
            {
                $is_follow = Following::where('user_id', $user_id)
                    ->where('campaign_id', $campign_id)
                    ->whereNull('deleted_at')
                    ->get();

                $del_follow = Following::where('id', $is_follow[0]->id)
                    ->delete();
                $data["Ack"]=0;
            }
        return $data;
    }

    
    public function following_details() 
    {
        $img_path=Config::get('constants.IMGPATH');
        $user=Auth::User();
        $follow = Following::join('campaigns' , 'campaigns.id' , '=' , 'followings.campaign_id')
                            ->join('users' , 'users.id' , '=' , 'campaigns.user_id')
                            ->whereNull('followings.deleted_at')
                            ->where('followings.user_id', '=', $user->id)
                            ->groupBy('campaigns.user_id')
                            ->get();

        foreach ($follow as $key => $value) {
            $new=Upload::where('id', '=', $value->image)
                        ->get();

            if($new->isEmpty())
            {
                $follow[$key]['usr_image']=$img_path.'nouser.png';
            }
            else
            {
                $follow[$key]['usr_image']=$img_path.pathinfo($new[0]->path, PATHINFO_BASENAME);
            }
        }
        //echo '<pre>'; print_r($follow);

         $followers=Campaign::join('followings' , 'followings.campaign_id' , '=' , 'campaigns.id')
                            ->join('users' , 'users.id' , '=' , 'followings.user_id')
                            ->whereNull('followings.deleted_at')
                            ->where('campaigns.user_id', '=', $user->id)
                            ->groupBy('followings.user_id')
                            ->get();

        foreach ($followers as $fkey => $fvalue) {
            $new_f=Upload::where('id', '=', $fvalue->image)
                        ->get();

            if($new_f->isEmpty())
            {
                $followers[$fkey]['f_usr_image']=$img_path.'nouser.png';
            }
            else
            {
                $followers[$fkey]['f_usr_image']=$img_path.pathinfo($new_f[0]->path, PATHINFO_BASENAME);
            }
        }

        //echo '<pre>'; print_r($followers); die;
        return view('Following/myFollowing',["following_list"=>$follow,"followers_list"=>$followers]);
    }
}