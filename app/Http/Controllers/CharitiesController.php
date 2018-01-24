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
use App\Models\Campaignvisit;
use App\Models\Donation;
use App\Models\Favorite;
use App\Models\Category;
use App\Models\Upload;
use App\Models\Rewarditem;
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
class CharitiesController extends Controller
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
    function index(Request $request)
    {
     
     $user=Auth::user();
     $queryparams = $request->all();

     $dbquery=Donation::join('campaigns', 'campaigns.id', '=', 'donations.campaign_id')
             ->select('campaigns.*',"donations.charity_amount")
             ->where("donations.charity_amount",">",0)
             ->where("donations.is_paid","=",1)
             ->where("campaigns.user_id","=",$user->id);
     
     if(!empty($queryparams["id"]))
     {
         $dbquery->where("campaigns.id","=",$queryparams["id"]);
     }
     //$donationamnt=$dbquery->get()->toArray();
//     echo "<pre>";
//     print_r($donationamnt);
//     exit;
     $donationamnt=$dbquery->sum("donations.charity_amount");
     $query=Campaignvisit::join('campaigns', 'campaigns.id', '=', 'campaignvisits.campaign_id')
                                  ->where("campaigns.user_id","=",$user->id);
     if(!empty($queryparams["id"]))
     {
         $query->where("campaigns.id","=",$queryparams["id"]);
     }
     $total_vistit= $query->count();
     $campaigns= Campaign::where("user_id","=",$user->id)->pluck('title', 'id')->toArray();
     return view('Charity/index',['donationamnt'=>$donationamnt,'total_vistit'=>$total_vistit,"campaigns"=>$campaigns,"query"=>$queryparams]);

    }
    
    public function monthlyreport($campign=null)
    {
        $months=array(
         'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Desc'    
         );
         $user=Auth::user();
         $charts=array();
         $visits=array();
        
         foreach ($months as $key=> $month)
         {
           $key=$key+1;  
           $user=Auth::user();
            $dbquery=Donation::join('campaigns', 'campaigns.id', '=', 'donations.campaign_id')
             ->select('campaigns.*',"donations.charity_amount")
             ->where("donations.charity_amount",">",0)
             ->whereMonth('donations.created_at', '=', $key)   
             ->whereYear('donations.created_at', '=', date('Y'))                
             ->where("donations.is_paid","=",1)
             ->where("campaigns.user_id","=",$user->id);
            if(!empty($campign))
            {
               $dbquery->where("donations.campaign_id","=",$campign); 
            }
            $donationamnt=$dbquery->sum('donations.charity_amount');
            $query=Campaignvisit::join('campaigns', 'campaigns.id', '=', 'campaignvisits.campaign_id')
                                  ->whereMonth('campaignvisits.created_at', '=', $key)   
                                  ->whereYear('campaignvisits.created_at', '=', date('Y'))
                                  ->where("campaigns.user_id","=",$user->id);

                    ;
            if(!empty($campign))
            {
               $query->where("campaignvisits.campaign_id","=",$campign); 
            }         
           $total_vistit= $query->count(); 
           
           
           $charts[]=array('month'=>(string)date("Y").'-'.$key,'a'=> (int)round($donationamnt));
           $visits[]=array('month'=>(string)date("Y").'-'.$key,'a'=> (int)round($total_vistit));
         }
         $country_donations=array();
         $dbquery=Donation::join('campaigns', 'campaigns.id', '=', 'donations.campaign_id')
           ->select('donations.country', DB::raw('sum(donations.charity_amount) as donateamnt'))             
           ->where("donations.charity_amount",">",0)         
           ->where("donations.is_paid","=",1)
           ->where("campaigns.user_id","=",$user->id)
           ->whereYear('donations.created_at', '=', date('Y'))         
           ->groupBy("donations.country");
             if(!empty($campign))
            {
               $dbquery->where("donations.campaign_id","=",$campign); 
            }
            
            $donationlists=$dbquery->get()->toArray();
            foreach($donationlists as $donate )
            {
                $country_donations[$donate['country']]=(int)round($donate['donateamnt']);
            }
            
            $dbquery=Campaignvisit::join('campaigns', 'campaigns.id', '=', 'campaignvisits.campaign_id')
                                  ->select('campaignvisits.country', DB::raw('count(campaignvisits.id) as viewcamp'))             
                                  ->whereYear('campaignvisits.created_at', '=', date('Y'))
                                  ->where("campaigns.user_id","=",$user->id)         
                                  ->groupBy("campaignvisits.country");
            if(!empty($campign))
            {
               $dbquery->where("campaignvisits.campaign_id","=",$campign); 
            }
            $donationlists=$dbquery->get()->toArray();
            foreach($donationlists as $donate )
            {
                $country_visits[$donate['country']]=(int)round($donate['viewcamp']);
            }
            
            echo json_encode(array('donations'=>$charts,'visits'=>$visits,"country_donations"=>$country_donations,
                "country_visits"=>$country_visits,
                "year"=>date('Y')));exit;
    }
    
    public function allcampaigns($slug=null)
    {
        $user=User::where("slug","=",$slug)->first();
        $dbquery = Campaign::with('imgpath')
                ->with('user')->with('profilephoto')->with('category')
                ->where("photo",">",0)
                ->whereNull('deleted_at')
                ->where("end_date",">=", gmdate("Y-m-d"))
                ->where("user_id","=",$user->id)
                ->where("step",">",0)
              ;
                $campigns = $dbquery->paginate(16);
                $campigns->setCollection(
                $campigns->getCollection()
                  ->map(function($item, $key)
                  {
                      $img_path=Config::get('constants.IMGPATH');
                      $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
                      $item->username=$item->user->first_name.' '.$item->user->last_name;
                      $user=User::with('imgpath')->whereNull("deleted_at")->where("id","=",$item->user->id)->first();
                        if(!empty($user->imgpath))
                        {
                            $user_img=$img_path.pathinfo($user->imgpath->path, PATHINFO_BASENAME);
                        }
                        else
                        {
                            $user_img=$img_path.'nouser.png';
                        }
                      $item->profile_image=$user_img;
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
              
             return view('Charity/campaign',['campaigns'=>$campigns,"user"=>$user]);

        
        
    }
    
    public function curated_pages() 
    {
        $recents_charities=User::With("imgpath")
                               ->where("type","=","C")
                                ->orderBY('updated_at','desc')
                                ->get();
        $img_path=Config::get('constants.IMGPATH');

        foreach ($recents_charities as $key=> $charity)
        {
            $recents_charities[$key]->image=!empty($charity->imgpath->path)?$img_path.pathinfo($charity->imgpath->path, PATHINFO_BASENAME):$img_path.'nouser.png';
        }
        
        $features=User::With("imgpath")
                               ->where("type","=","C")
                                ->where('is_featured','=',1)
                                ->get();
        $img_path=Config::get('constants.IMGPATH');

        foreach ($features as $key=> $charity)
        {
            $features[$key]->image=!empty($charity->imgpath->path)?$img_path.pathinfo($charity->imgpath->path, PATHINFO_BASENAME):$img_path.'nouser.png';
        }
        
        return view('Charity/curated_pages',['recents_charities'=>$recents_charities,"features"=>$features]);

        
        
        
        
    }
    
    
    
    
       
}