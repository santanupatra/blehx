<?php
namespace App\Helpers;

use App\Models\Banner;
use App\Models\Campaign;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Site_Setting;
use App\Models\Favorite;
use App\Models\Category;
use App\Models\Upload;
use App\Models\Rewarditem;
use App\Models\Campaignvisit;
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

class CustomHelper {
    public static function my_project_list()
    {
      $user=Auth::user();
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
      return $campigns;
    }

}