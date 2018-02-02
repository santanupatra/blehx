<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Campaign;
use App\Models\Site_Setting;
use App\Models\User;
use Config;
use Auth;
use DB;
use URL;
use View;
use Mail;
use Session;
class Controller extends BaseController
{
    public function __construct() {
        $img_path=Config::get('constants.IMGPATH');
        $site_setting= Site_Setting::select("*")->where(['id' => 1])->select('*')->first();
        /*$site_setting=Site_Setting::with("imgpath")->first();
        $logo_path=$site_setting->imgpath->path;
        $site_setting->imgpath->path=$img_path.pathinfo($logo_path, PATHINFO_BASENAME);*/
        $user=Auth::user();        
        if(!empty($user))
        {
            $logged_user=User::select('*')->where("id","=",$user->id)->first();

            //$logged_user->image=!empty($logged_user->imgpath->path)?
            //$img_path.pathinfo($logged_user->imgpath->path, PATHINFO_BASENAME):$img_path.'nouser.png';

        }
        else{
          $logged_user=array();  
      }

      /*if(Auth::user())
        {
          $dbquery = Campaign::with('imgpath')
          ->whereNull('deleted_at')
          ->where("user_id","=",$user->id)
          ->where("photo",">",0)
          ->orderBy("id","desc");

          $campigns = $dbquery->paginate(16);
          $campigns->setCollection(
              $campigns->getCollection()
              ->map(function($item, $key)
              {
                $img_path=Config::get('constants.IMGPATH');
                $item->campaign_pic = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
                return $item;
            })
              );
          view()->share('campigns', $campigns); 
      }*/

      view()->share('site_setting', $site_setting); 
      view()->share('logged_user', $logged_user);
      
  }   

  protected function how_long_ago($timestamp)
  {
    $timestamp=  base64_decode($timestamp);
    if(!isset($timestamp) ||  empty($timestamp)) return false;
    $difference = time() - strtotime($timestamp);
    if($difference < 60)

        return array('duration'=>$difference,'type'=>"second");
    else{
        $difference = round($difference / 60);
        if($difference < 60)
            return array('duration'=>$difference,'type'=>"minutes");

        else{
            $difference = round($difference / 60);
            if($difference < 24)
                return array('duration'=>$difference,'type'=>"hours");
            else{
                $difference = round($difference / 24);
                if($difference < 7)
                   return array('duration'=>$difference,'type'=>"days");
               else{
                $difference = round($difference / 7);
                return array('duration'=>$difference,'type'=>"weeks");
            }
        }
    }
}				
}

protected function create_slug($string, $ext=''){     
	$replace = '-';         
	$string = strtolower($string);     

	//replace / and . with white space     
	$string = preg_replace("/[\/\.]/", " ", $string);     
	$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     

	//remove multiple dashes or whitespaces     
	$string = preg_replace("/[\s-]+/", " ", $string);     

	//convert whitespaces and underscore to $replace     
	$string = preg_replace("/[\s_]/", $replace, $string);     

	//limit the slug size     
	$string = substr($string, 0, 200);     

	//slug is generated     
	return ($ext) ? $string.$ext : $string; 
}

use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}
