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
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class CampignsController extends Controller
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
      $url_segment = \Request::segment(3);
      $query = $request->all();
      
      $categories= DB::table('categories')->pluck('name', 'id');
      //print_r($categories);exit;
      
      $dbquery = Campaign::with('imgpath')
                ->with('user')->with('profilephoto')->with('category')
                ->where("photo",">",0)
                ->whereNull('deleted_at')
                ->where("end_date",">=", gmdate("Y-m-d"))
                ->where("step",">",0)
              ;
      if(!empty($query["category_id"]))
      {
          $dbquery->where('category_id','=',$query["category_id"]);
      }
      if(!empty($query["title"]))
      {
          $dbquery->where('title','LIKE','%'.$query["title"].'%');
      }
      
      if(!empty($query['sort']))
      {
          $dbquery->orderBy($query['sort'], "desc");
      }
      
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

    //get max funded campaign (7 nov 2017_Tanay)
      $get_heighest_donated_campaign=Campaign::with('category')
                ->with('profilephoto')
                ->with('user')
                ->with('imgpath')
                ->where("photo",">",0)
                ->whereNull('deleted_at')
                ->where("end_date",">=", gmdate("Y-m-d"))
                ->where("step",">",0)
                ->orderBy('total_donation', 'DESC')
                ->Limit(1)
                ->get();

            $img_path=Config::get('constants.IMGPATH');

            $get_heighest_donated_campaign[0]->campaign_photo=$img_path.pathinfo($get_heighest_donated_campaign[0]->imgpath->path, PATHINFO_BASENAME);

            $get_heighest_donated_campaign[0]->profile_photo=!empty($get_heighest_donated_campaign[0]->profilephoto->path)?$img_path.pathinfo($get_heighest_donated_campaign[0]->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';

            $heighest_campaign_total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $get_heighest_donated_campaign[0]->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($heighest_campaign_total_donation>0)
            {
                $get_heighest_donated_campaign[0]->total_funded=round(($heighest_campaign_total_donation*100)/$get_heighest_donated_campaign[0]->goal);
            }
            else
            {
                $get_heighest_donated_campaign[0]->total_funded=0;
            }

            $posted_at=$this->how_long_ago(base64_encode($get_heighest_donated_campaign[0]->created_at));
            $get_heighest_donated_campaign[0]->duration=$posted_at['duration'];
            $get_heighest_donated_campaign[0]->duration_type=$posted_at['type'];
      //end

     return view('Campaigns/index',["campaigns"=>$campigns,"categories"=>$categories,"query"=>$query,"heighest_donated_campaign"=>$get_heighest_donated_campaign[0]]);
    }

    public function details($slug) 
    {
        
        $SITEURL=Config::get('constants.SITEURL');        
        $campaign=Campaign::with('imgpath')
                    ->with('profilephoto') 
                    ->with('category')
                    ->with('photos')
                    ->with('user')
                    ->where("slug","=",$slug)
                    ->first()
                    ;  
                    $total_donation = DB::table('donations')
                    ->where('is_paid', 1)
                    ->where('campaign_id', $campaign->id)
                    ->whereNull('deleted_at')
                    ->sum('amount');
                     $total_donate_user = DB::table('donations')
                    ->where('is_paid', 1)
                    ->where('campaign_id', $campaign->id)
                    ->whereNull('deleted_at')
                    ->count("id");
                     
                    if($total_donation>0)
                    {
                        $campaign->funded=round(($total_donation*100)/$campaign->goal);
                    }
                    else
                    {
                        $campaign->funded=0;
                    }
                    $campaign->total_donation=$total_donation;
                    $campaign->total_donate_user=$total_donate_user;
                    $img_path=Config::get('constants.IMGPATH');
                    $campaign->site_url=$SITEURL.'campaign/'.$campaign->slug;
                    $campaign->shareimg=$img_path.pathinfo($campaign->imgpath->path, PATHINFO_BASENAME);
                    $campaign->paypal_email=!empty($campaign->user->paypal_email)?$campaign->user->paypal_email:'';
                    $photos[]=$img_path.pathinfo($campaign->imgpath->path, PATHINFO_BASENAME);
                    foreach ($campaign->photos as $photo)
                    {
                        
                        $img=DB::table("uploads")->WhereNull('deleted_at')->where('id','=',$photo->image)->first();
                        $photos[]=$img_path.pathinfo($img->path, PATHINFO_BASENAME);
                    }
                    $ip = file_get_contents('https://api.ipify.org');
                    if(empty($ip))
                    {
                        $ip="111.93.169.90";
                    }
                    $browser = json_decode(file_get_contents('http://ip-api.com/json/' . $ip));  
                    if($browser->status == 'success')
                    {
                       $countryCode=$browser->countryCode;
                    }
                    else
                    {
                       $countryCode="IN";
                    }
                    $insert=array("ip"=>$ip,"campaign_id"=>$campaign->id,"country"=>$countryCode);
                    $check_view=Campaignvisit::where("campaign_id","=",$campaign->id)
                                               ->where("ip","=",$ip)
                                               ->count()
                                                ;
                    if(!$check_view)
                    {
                    Campaignvisit::create($insert);
                    }
                    $campaign->photos=!empty($photos)?$photos:"";
                    $campaign->username=$campaign->user->first_name.' '.$campaign->user->last_name;
                    $campaign->profile_image=!empty($campaign->profilephoto->path)?$img_path.pathinfo($campaign->profilephoto->path, PATHINFO_BASENAME):
                    $img_path.'nouser.png';
                    $how_long_ago=$this->how_long_ago(base64_encode($campaign->created_at));
                    $campaign->duration=$how_long_ago['duration'];
                    $campaign->duration_type=$how_long_ago['type'];

                    //get current campaign favourite status to check favourite or not (7 nov 2017_Tanay)
                    $user=Auth::user();
                    $is_favorite = Favorite::where('user_id', $user->id)
                    ->where('campaign_id', $campaign->id)
                    ->count();
                   //end
                    return view('Campaigns/details',["campaign"=>$campaign,"favourite"=>$is_favorite]);

        
    }
    public function favorite($user_id,$campign_id) 
    {
        $is_favorite = Favorite::where('user_id', $user_id)
                    ->where('campaign_id', $campign_id)
                    ->count();
        
        if(!$is_favorite)
        {
            DB::table('favourites')->insert(array('user_id'=>$user_id,'campaign_id'=>$campign_id));
            $campaign=Campaign::where("id","=",$campign_id)->first();
            $total_favorite=($campaign->total_favorite+1);
            $update=DB::table("campaigns");
            DB::table('campaigns')
            ->where('id', $campign_id)
            ->update([
                'total_favorite' =>$total_favorite
            ]);
            $data["Ack"]=1;
        }
        else
        {
            $data["Ack"]=0;
        }
        
        echo json_encode($data);exit;
        
        
    }
    
    function myproject(Request $request)
    {
      $url_segment = \Request::segment(3);
      $user=Auth::user();
      $query = $request->all();
      $categories= DB::table('categories')->pluck('name', 'id');
      //print_r($categories);exit;
      
      $dbquery = Campaign::with('imgpath')
                ->with('user')->with('profilephoto')->with('category')
                ->whereNull('deleted_at')->where("user_id","=",$user->id)->where("photo",">",0)->orderBy("id","desc");
      
      if(!empty($query["category_id"]))
      {
          $dbquery->where('category_id','=',$query["category_id"]);
      }
      
      
      if(!empty($query['sort']))
      {
          $dbquery->orderBy($query['sort'], "desc");
      }
      
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
        
     
     return view('Myprojects/index',["campaigns"=>$campigns,"categories"=>$categories,"query"=>$query]);

    }
    
    function archive(Request $request)
    {
      $url_segment = \Request::segment(3);
      $user=Auth::user();
      $query = $request->all();
      $categories= DB::table('categories')->pluck('name', 'id');
      //print_r($categories);exit;
     
      
      $dbquery = Campaign::with('imgpath')
                ->with('user')
                ->with('profilephoto')
                ->with('category')
                ->where("user_id","=",$user->id)
                ;
      
      
      
      $campigns = $dbquery->onlyTrashed()->paginate(16);
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
        
     
     return view('Myprojects/archive',["campaigns"=>$campigns,"categories"=>$categories,"query"=>$query]);

    }
    
    public function deletecamp($id)
    {
      DB::table('campaigns')
          ->where('id', $id)
          ->update(['deleted_at' => gmdate("Y-m-d H:i:s")]);  
      return  redirect()->back()->withMessage("Your campign has been deleted successfully");           

    }
    
    public function restore($id)
    {
      DB::table('campaigns')
          ->where('id', $id)
          ->update(['deleted_at' => NULL]);  
      return  redirect()->back()->withMessage("Your campign has been restored successfully");           

    }
    
    public function favorites()
    {
        
        $user=Auth::user();
     
      
      $dbquery = Favorite::where("user_id","=",$user->id);
      $favorites = $dbquery->paginate(16);
      $favorites->setCollection(
      $favorites->getCollection()
        ->map(function($item, $key)
        {
            
            $campaign=Campaign::with('imgpath')
                ->with('user')->with('profilephoto')->with('category')
                ->where("id","=",$item->campaign_id)->first();
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($campaign->imgpath->path, PATHINFO_BASENAME);
            $item->username=$campaign->user->first_name.' '.$campaign->user->last_name;
            $item->profile_image=!empty($campaign->profilephoto->path)?$img_path.pathinfo($campaign->profilephoto->path, PATHINFO_BASENAME):
                                 $img_path.'nouser.png';
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->where('campaign_id', $campaign->id)
                ->whereNull('deleted_at')
                ->sum('amount');
            if($total_donation>0)
            {
                $item->funded=round(($total_donation*100)/$campaign->goal);
            }
            else
            {
                $item->funded=0;
            }
            $item->title=$campaign->title;
            $item->campid=$campaign->id;
            $item->goal=$campaign->goal;
            $item->short_description=$campaign->short_description;
            $item->category=$campaign->category->name;
            $item->slug=$campaign->slug;
            $how_long_ago=$this->how_long_ago(base64_encode($campaign->created_at));
            $item->duration=$how_long_ago['duration'];
            $item->duration_type=$how_long_ago['type'];
            return $item;
        })
       
        
    );  
             return view('Myprojects/favorite',["favorites"=>$favorites]);

    }
    
    function unfavorite($id)
    {
        DB::table('favourites')
            ->where('id', $id)
            ->update(['deleted_at' => gmdate("Y-m-d H:i:s")]);
       return  redirect()->back()->withMessage("Unfavorite successfully");           

    }
    public function cereatecampaign(Request $request) 
    {
        $user=Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:campaigns',
            'category_id' => 'required',
            'country'=>'required'

        ]);
        
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $data=$request->all();
            $data["slug"]=$this->create_slug($data['title']);
            $insert_id=Campaign::create($data);
            $request->session()->put('lastcampid', $insert_id->id);
            if(!empty($user->id))
            {
              return redirect()->action('CampignsController@editcampaign',['slug'=>$data["slug"]]);
            }
            else
            {
               return  redirect()->action('UsersController@signincamp')->withMessage("Please login first");           
            }
        }
    }
    
    public function startproject(Request $request) 
    {
        $categories= Category::where("parent_id","=",0)->orderBy('name')->get();
        $selectcategory=$request->session()->get('selectcategory');
        return view('Campaigns/startproject',['categories'=>$categories,"selectcategory"=>$selectcategory]);
    }
    
    public function editcampaign($slug=null,$tab=null) 
    {
        $campaign=Campaign::with("imgpath")->with("profilephoto")->where("slug","=",$slug)->first();
        $categories= Category::where("parent_id","=",0)->orderBy('name')->get();
        $subcategories= Category::where("parent_id","=",$campaign->category_id)->get();
        $img_path=Config::get('constants.IMGPATH');
        if($campaign->photo>0)
        {
           
            $campaign->imgpath->path=$img_path.pathinfo($campaign->imgpath->path, PATHINFO_BASENAME);
        }
       
        if($campaign->profile_image>0)
        {
           
            $campaign->profilephoto->path=$img_path.pathinfo($campaign->profilephoto->path, PATHINFO_BASENAME);
        }
        $campaign->website= !empty($campaign->website)?json_decode($campaign->website):'';
       
        return view('Campaigns/create',['categories'=>$categories,"subcategories"=>!empty($subcategories)?$subcategories:array(),"campaign"=>$campaign
                                        ,'slect_tab'=>!empty($tab)?$tab:''
                                       ]);
    }
    
    public function update(Request $request, $id) 
    {
        
         $user=Auth::user();
         $data=$request->all();
         $validator = Validator::make($request->all(), [
        'short_description' => 'required',
        'location' => 'required',
        'category_id' => 'required',
        'end_type' => 'required',
        'goal' => 'required|numeric',
        'location' => 'required',
        'photo' => $data['hide_image']<=0?'required|image|mimes:jpeg,png,jpg,gif,bmp|max:2048':'',    
        'title' => 'required|unique:campaigns,title,'.$id,
       ]);
       if ($validator->fails()) 
       {
            return redirect()->back()->withErrors($validator)->withInput();;
       }
       
       else
       {
           
            $file = $request->file('photo') ;
            if(!empty($file))
            {
            $imageName = uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = storage_path('/uploads');
            $file->move($destinationPath, $imageName);
            $upload_data["name"]=$file->getClientOriginalName();
            $upload_data["path"]=storage_path().'uploads/'.$imageName;
            $upload_data["extension"]=$file->getClientOriginalExtension();
            $upload_data["user_id"]=$user->id;
            $upload=Upload::create($upload_data);
            $data["photo"]=$upload->id;
            
            
            }
            else
            {
            $data["photo"]=$data["hide_image"];
                
            }
            
            $data["step"]=2;
            unset($data['_method']);
            unset($data['_token']);
            unset($data['hide_image']);
            $data["slug"]=$this->create_slug($data["title"]);
            if($data["end_type"]==1)
            {
            $datetime = new DateTime(null, new DateTimeZone('UTC'));
            $datetime->modify('+'.$data["no_of_day"].' days');
            $data["end_date"]=$datetime->format('Y-m-d');    
            }
            $insert_id=DB::table("campaigns")
                       ->where("id","=",$id)
                        ->update($data)
                        ; 
            return  redirect()->action('CampignsController@editcampaign',['slug'=>$data["slug"],'tab'=>'profile_tab'])->withMessage("The information has been saved successfully");           

            
            
           
       }
        
    }
    
    public function updatethird(Request $request, $id) 
    {
        
         $user=Auth::user();
         $data=$request->all();
         $validator = Validator::make($request->all(), [
        'description' => 'required',
        'video' => 'mimes:mp4,mov,mpeg,avi,3gp,wmv,flv | max:200000',    
       ]);
       if ($validator->fails()) 
       {
            return redirect()->back()->withErrors($validator)->withInput();;
       }
       
       else
       {
           
            $file = $request->file('video') ;
            if(!empty($file))
            {
            $imageName = uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = storage_path('/videos');
            $file->move($destinationPath, $imageName);
            $upload_data["name"]=$file->getClientOriginalName();
            $upload_data["path"]=storage_path().'videos/'.$imageName;
            $upload_data["extension"]=$file->getClientOriginalExtension();
            $upload_data["user_id"]=$user->id;
            $upload=Upload::create($upload_data);
            $data["video"]=$upload->id;
            
            
            }
            else
            {
            $data["video"]=$data["hide_video"];
                
            }
            
            $data["step"]=3;
            unset($data['_method']);
            unset($data['_token']);
            unset($data['hide_video']);
            
            $insert_id=DB::table("campaigns")
                       ->where("id","=",$id)
                        ->update($data)
                        ; 
            $campaign=Campaign::where("id","=",$id)->first();
            
            return  redirect()->action("CampignsController@editcampaign",["slug"=>$campaign->slug,'tab'=>"references"])->withMessage("The information has been saved successfully");           

            
            
           
       }
        
    }
    
    public function updatefourth(Request $request, $id) 
    {
        
         $user=Auth::user();
         $data=$request->all();
         $validator = Validator::make($request->all(), [
        
        'profile_image' =>'image|mimes:jpeg,png,jpg,gif,bmp|max:52428800',    
       ]);
       if ($validator->fails()) 
       {
            return redirect()->back()->withErrors($validator)->withInput();;
       }
       
       else
       {
           
            $file = $request->file('profile_image') ;
            if(!empty($file))
            {
            $imageName = uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = storage_path('/uploads');
            $file->move($destinationPath, $imageName);
            $upload_data["name"]=$file->getClientOriginalName();
            $upload_data["path"]=storage_path().'uploads/'.$imageName;
            $upload_data["extension"]=$file->getClientOriginalExtension();
            $upload=Upload::create($upload_data);
            $data["profile_image"]=$upload->id;
            
            }
            $data["website"]=!empty($data["website"])?json_encode($data["website"]):'';
            $data["step"]=4;
            unset($data['_method']);
            unset($data['_token']);
            $insert_id=DB::table("campaigns")
                       ->where("id","=",$id)
                        ->update($data)
                        ; 
            $campaign=Campaign::where("id","=",$id)->first();
            return  redirect()->action('CampignsController@editcampaign',['slug'=>$campaign->slug,'tab'=>'references1'])->withMessage("The information has been saved successfully");           
 
       }
        
    }
    public function storeitem(Request $request)
    {
     $data=$request->all();
     $insert_id=Rewarditem::create($data);
     $id=$data["campaign_id"];
     $campaign=Campaign::where("id","=",$id)->first();
     return  redirect()->action('CampignsController@editcampaign',['slug'=>$campaign->slug,'tab'=>'buzz']);           

    }
    
       
}