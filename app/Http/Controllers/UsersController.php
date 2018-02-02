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
use App\Models\Upload;
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
class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //parent::__construct();
    }

    
    
    /**
     * Show the application dashboard.
     *
     * @return Response
     */

    public function prising()
    {
      return view('Users/prising');     
    }

    public function contactus()
    {      
      return view('Users/contactus');     
    }

    public function sendmail(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails())
        {
          return redirect('contactus')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
           $data = request()->all();
           $name = $data['name'];
           $email = $data['email'];
           $phone = $data['phone'];
           $title = $data['title'];
           $message = $data['message'];
           //$site_setting=Site_Setting::with("imgpath")->first();
           $site_setting = DB::table('site_settings')->where("id","=",1)->select('admin_email')->first();           
           $email_tpl = DB::table('email_templates')->where("id","=",8)->first();
           //$logo_path=$site_setting->imgpath->path;
           //$LOGO=$img_path.pathinfo($logo_path, PATHINFO_BASENAME);
           //$link=$SITEURL.'user/active/'.base64_encode($insertedId);
           $msg= str_replace(array('[NAME]','[EMAIL]','[PHONE]','[SUBJECT]','[MESSAGE]'),array($name, $email, $phone, $title, $message),$email_tpl->content); 
           $html = array('from' => $site_setting->admin_email, 'to' => $email,'subject'=>$email_tpl->subject,'content'=>$msg);
           Mail::send(array(),array(), function ($message) use ($html){
            $message->to($html['to'])
              ->subject($html['subject'])
              ->from($html['from'])
              ->setBody($html['content'], 'text/html');
          });
          return redirect()->back()->with('message', 'You have been successfull submited the form.');
        }
    }
    public function signup()
    {
        $roleCount = \App\Role::count();
		if($roleCount != 0) {
			if($roleCount != 0) { 
        return view('Users/signup');
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }
    
    public function store(Request $request)
    {
        $img_path=Config::get('constants.IMGPATH');
        $SITEURL=Config::get('constants.SITEURL');        
        $validator = Validator::make($request->all(), [            
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
          return redirect('signup')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
           $data = request()->all();           
           $user['email'] = $data['email'];
           $user['password'] = bcrypt($data['password']);
           $user=User::create($user);
           $insertedId = $user->id;
           $email_tpl = DB::table('email_templates')->where("id","=",1)->first();
           // $site_setting=Site_Setting::with("imgpath")->first();
           $site_setting = DB::table('site_settings')->where("id","=",1)->first();
           //$logo_path=$site_setting->imgpath->path;
           //$LOGO=$img_path.pathinfo($logo_path, PATHINFO_BASENAME);
           $link=$SITEURL.'user/active/'.base64_encode($insertedId);
           $msg= str_replace(array('[NAME]','[LINK]'),array($user->first_name,$link),$email_tpl->content); 
           $html = array('from' => $site_setting->admin_email, 'to' => $user->email,'subject'=>$email_tpl->subject,'content'=>$msg);
           Mail::send(array(),array(), function ($message) use ($html){
            $message->to($html['to'])
              ->subject($html['subject'])
              ->from($html['from'])
              ->setBody($html['content'], 'text/html');
          });
          return redirect()->back()->with('message', 'You have been signup successfull.Please check your Mail!');
        }
    }
    
    function active($id)
    {
        $id= base64_decode($id);
        try {
            DB::table('users')
            ->where('id', $id)
            ->update(['is_active' => 1]);
            return  redirect()->action('UsersController@signin')->withMessage("Your account has been activated successfully");           

        } catch (Exception $ex) {
            
            print_r($ex);
            
        }

        
        
    }
    
    function signin()
    {
       return view('Users/signin');

    }
    
    public function actionsignin(Request $request) 
    {
      
        $email=$request->input('email');
        $password=$request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user=Auth::user();
            if($user->is_active)
            {
              if($user->type=='S')
              {
                 return  redirect()->action('UsersController@sellerDashboard')->withMessage("You have been Logged in successfully!");           
              }
              else
              {
                return  redirect()->action('UsersController@userDashboard')->withMessage("You have been Logged in successfully!");           
              }
            }
            else
            {
                Auth::logout();
                return redirect()->back()->with('warning', 'Your account is not activated');
            }
        }
        else
        {
          return redirect()->back()->with('warning', 'Invalid Log in credential');
        }
    }
    
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'email' => 'required|email|unique:subscribers',
        ]);
        
        if ($validator->fails()) {
            
            return redirect()
                        ->back()    
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
          $data= $request->all(); 
          unset($data['_method']);
          unset($data['_token']);   
          DB::table('subscribers')->insert($data);
          return  redirect()->back()->withMessage("Newsletter subscriptions has been saved");           

            
        }
        
        
    }
    
    public function signincamp() 
    {
       return view('Users/signincamp');
    }
    public function userDashboard(){
      return view('Users/user_dashboard');
    }
    
    function actionsignincamp(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user=Auth::user();
           
            if($user->is_active)
            {
                
              $campign_id=$request->session()->get('lastcampid');
              $campaign=Campaign::where("id","=",$campign_id)->first();
              DB::table('campaigns')
                ->where('id', $campign_id)
                ->update(['user_id' => $user->id]);
                return redirect()->action('CampignsController@editcampaign',['slug'=>$campaign->slug]);
            }
            else{
                Auth::logout();
                return redirect()->back()->with('warning', 'Your account is not activated');
            }

        }
        else
        {
          return redirect()->back()->with('warning', 'Invalid Log in credential');

        } 
    }

    public function logout() 
    {
       Auth::logout();
       return  redirect()->action('HomeController@index');           
    }
    

    public function userprofile($id=null)
    {
      $check_user=User::where("users.id","=",$id)
                    ->first();

      if($check_user->image != 0)
      {
        $user=User::join('uploads' , 'uploads.id' , '=' , 'users.image')
                      ->where("users.id","=",$id)
                      ->select('users.id as user_id','users.first_name as first_name','users.last_name as last_name','users.email as email','users.city as city','users.country as country','users.state as state','uploads.path as path','users.image as users_img','users.created_at as user_join')
                      ->first();
      }
      else
      {
        $user=User::where("users.id","=",$id)
                    ->select('users.id as user_id','users.first_name as first_name','users.last_name as last_name','users.email as email','users.city as city','users.country as country','users.state as state','users.image as users_img','users.created_at as user_join')
                    ->first();
      }

        $img_path=Config::get('constants.IMGPATH');
        if($user->users_img==0)
        $user->profile_photo=$img_path.'nouser.png';
        else
        $user->profile_photo=$img_path.pathinfo($user->path, PATHINFO_BASENAME);

        $dbquery = Campaign::with('imgpath')
        ->with('user')->with('profilephoto')->with('category')
        ->whereNull('deleted_at')->where("user_id","=",$id)->where("photo",">",0)->orderBy("id","desc");

        $campigns = $dbquery->paginate(16);
        $campigns->setCollection(
          $campigns->getCollection()
          ->map(function($item, $key)
          {
            $img_path=Config::get('constants.IMGPATH');
            $item->photo = $img_path.pathinfo($item->imgpath->path, PATHINFO_BASENAME);
            $item->username=$item->user->first_name.' '.$item->user->last_name;
            $item->profile_image=!empty($item->profilephoto->path)?$img_path.pathinfo($item->profilephoto->path, PATHINFO_BASENAME):$img_path.'nouser.png';
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

        //echo '<pre>'; print_r($campigns); die;
       return view('Users/userprofile',['user'=>$user,'user_campaigns'=>$campigns]);
    }

    public function profile() 
    {
       $user_dtl=Auth::user();
       $user=User::where("id","=",$user_dtl->id)->first();
       return view('Users/profile',['user'=>$user]);
    }
    
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $data=$request->all();
        $validator = Validator::make($request->all(), [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_no' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'image' =>'image|mimes:jpeg,png,jpg,gif,bmp|max:2048',    
        'email' => 'required|email|unique:users,email,'.$id,
        'paypal_email' => 'required|email|unique:users,paypal_email,'.$id,
       ]);
       if ($validator->fails()) 
       {
            return redirect()->back()->withErrors($validator)->withInput();;
       }
       else
       {
            $file = $request->file('image') ;
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
              $data["image"]=$upload->id;
            }            
            unset($data['_method']);
            unset($data['_token']);
            $data["slug"]=$this->create_slug($data['first_name']);

            $insert_id=DB::table("users")
                      ->where("id","=",$id)
                      ->update($data); 
            return  redirect()->back()->withMessage("Your information has been saved successfully");           
       }
    }
    
    function charitysignup()
    {
       return view('Users/charitysignup');

    }
    function storecharity(Request $request)
    {
        
        $img_path=Config::get('constants.IMGPATH');
        $SITEURL=Config::get('constants.SITEURL');        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'retytpeemail'=>'required|same:email',
            'retypepass'=>'required|same:password',
            
        ]);
        

        if ($validator->fails()) {
            
            return redirect('charitysignup')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
          
           $data = request()->all();
           $data["slug"]=$this->create_slug($data['first_name']);
           unset($data['retytpeemail']);
           unset($data['retypepass']);
           unset($data['privacy']);
           $user=User::create($data);
           $insertedId = $user->id;
           $email_tpl = DB::table('email_templates')->where("id","=",1)->first();
           $site_setting=Site_Setting::with("imgpath")->first();
           $logo_path=$site_setting->imgpath->path;
           $LOGO=$img_path.pathinfo($logo_path, PATHINFO_BASENAME);
           $link=$SITEURL.'user/charityactive/'.base64_encode($insertedId);
           $msg= str_replace(array('[LOGO]','[NAME]','[LINK]'),array($LOGO,$user->first_name,$link),$email_tpl->content); 
           $html = array('from' => $site_setting->admin_email, 'to' => $user->email,'subject'=>$email_tpl->subject,
                         'content'=>$msg   
               );
           Mail::send(array(),array(), function ($message) use ($html) {
            $message->to($html['to'])
              ->subject($html['subject'])
              ->from($html['from'])
              ->setBody($html['content'], 'text/html');
          });
             
            return  redirect()->action('UsersController@charitythankyou');           
        }
        
    }
    
    function charitythankyou()
    {
               return view('Users/charitythankyou');

    }
    
    function charityactive($id=null)
    {
        $id= base64_decode($id);
        try {
            DB::table('users')
            ->where('id', $id)
            ->update(['is_active' => 1]);            
            $user=DB::table("users")->where("id","=",$id)->first();
            Auth::loginUsingId($user->id);            
            return  redirect()->action('UsersController@charityprofile');           

        } catch (Exception $ex) {
            
            print_r($ex);
            
        }
    }
    
    function charityprofile()
    {
       $user_dtl=Auth::user();
       $user=User::where("id","=",$user_dtl->id)->first();
       return view('Users/charityprofile',['user'=>$user]);
        
    }
    
    function charityupdate(Request $request,$id)
    {
        $user=Auth::user();
        $data=$request->all();
        $validator = Validator::make($request->all(),[
        /*'first_name' => 'required|unique:users,first_name,'.$id,*/
        'first_name' => 'required',
        'last_name' => 'required',
        'street_address_1' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'file' =>'image|mimes:jpeg,png,jpg,gif,bmp|max:52428800',
        'street_address_1' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zip' => 'required',
        'phone_no' => 'required',
        'website' => 'required',
        'charity_reg' => 'required',
       ]);
       if ($validator->fails()) 
       {
          return redirect()->back()->withErrors($validator)->withInput();
       }
       else
       {
            unset($data['_method']);
            unset($data['_token']);

            $file=$request->file('file');
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
              $data["image"]=$upload->id;
            }
            unset($data['file']);
            $data["slug"]=$this->create_slug($data['first_name']);
            $insert_id=DB::table("users")
                       ->where("id","=",$id)
                        ->update($data);
            return  redirect()->back()->withMessage("1");
       }
    }
    
    function sociallogin(Request $request)
    {
        $data = request()->all();
        $email=$data["email"];
        $user=DB::table("users")->where('email',"=",$email)->first();   
        $data["is_active"]=1;
        unset($data["_token"]);
        if(!empty($user))
        {
           DB::table('users')
            ->where('id', $user->id)
            ->update($data);    
           $data["Ack"]=1;
           $data["ShowModal"]=0;
           $data["user_id"]=$user->id;
           $data["type"]=$user->type;
           Auth::loginUsingId($user->id);            
        }
        else
        {
            $user=User::create($data);
            $data["Ack"]=1;  
            $data["ShowModal"]=1;
            $data["type"]="";
            $data["user_id"]=$user->id;
        }
        echo json_encode($data);
    
        
        
    }
    
    function settype(Request $request)
    {
       $data = request()->all();
       $id=$data["id"];
       unset($data["_token"]);
       DB::table('users')
            ->where('id', $id)
            ->update($data);
       Auth::loginUsingId($id);            
       $response["Ack"]=1;
       $response["usertype"]=$data["type"];
       echo json_encode($response);
       
  
    }
    
    function checkname($name)
    {
        $user=DB::table("users")->where("first_name","=",$name)->where("type","=","C")->first();
        if(empty($user))
        {
            $data["Ack"]=1;
        }
        else
        {
            $data["Ack"]=0;
        }
        echo json_encode($data);
        
    }
    function checkemail($email)
    {
        $user=DB::table("users")->where("email","=",$email)->first();
        if(empty($user))
        {
            $data["Ack"]=1;
        }
        else
        {
            $data["Ack"]=0;
        }
        echo json_encode($data);
        
    }
    
    
    
    
    
    
    
    
}