<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Banner;
use App\Models\Donation;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Site_Setting;
use App\Models\Campaign;
use Receiver;
use ReceiverList;
use PayRequest;
use RequestEnvelope;
use AdaptivePaymentsService;
use Configuration;
use PaymentDetailsRequest;
use PaymentDetails;
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
class DonationsController extends Controller
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
      
        include(app_path() . '/Providers/paypal/PPBootStrap.php');
        include(app_path() .'/Providers/paypal/Common/Constants.php');
        $user=Auth::user();
        $messages = [
            'paypal_email.required' => 'This charity has not set his Paypal email!',
        ];
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.1',
            'paypal_email'=>'required|email'

        ],$messages);
        
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
                $data=$request->all();
                $ip = file_get_contents('https://api.ipify.org');
                if(empty($ip))
                {
                    $ip="111.93.169.90";
                }

                $browser = json_decode(file_get_contents('http://ip-api.com/json/' . $ip));  

                if($browser->status == 'success')
                {
                   $data['country']=$browser->countryCode;
                }
                else
                {
                    $data['country']="IN";
                }
               
                $site_setting=Site_Setting::first();
                $charity_paypal=$data['paypal_email'];
                $amount=$data['amount'];
                $admin_percentage=$site_setting->admin_percentage;
                $admin_amount=($admin_percentage*$amount)/100;
                $charity_amount=$amount-$admin_amount;
                $data['admin_amount']=round($admin_amount,2);
                $data['charity_amount']=round($charity_amount,2);
                $data['user_id']=$user->id;
                define("DEFAULT_SELECT", "- Select -");
                $receiver = array();
                $SITE_URL=Config::get('constants.SITEURL');
                $returnUrl = $SITE_URL."success";
                $cancelUrl = $SITE_URL."failure";
                $memo = "Adaptive Payment - chained Payment";
                $actionType = "PAY";
                $currencyCode = "USD";
                $receiver[0] = new Receiver();
                $receiver[0]->email = trim($site_setting->paypal_email);
                $receiver[0]->amount = round($admin_amount,2);
                $receiver[0]->primary = false;


                $receiver[1] = new Receiver();
                $receiver[1]->email = trim($charity_paypal);
                $receiver[1]->amount = round($charity_amount,2);
                $receiver[1]->primary = false;

                /*
                 * Set to true to indicate a chained payment; only one receiver can be a primary receiver. Omit this field, or set it to false for simple and parallel payments. 
                 */
                 $receiverList = new ReceiverList($receiver);
                 $payRequest = new PayRequest(new RequestEnvelope("en_US"), $actionType, $cancelUrl, $currencyCode, $receiverList, $returnUrl);
                 $service = new AdaptivePaymentsService(Configuration::getAcctAndConfig());
                 try {
                        /* wrap API method calls on the service object with a try catch */
                        $response = $service->Pay($payRequest);
                        $ack = strtoupper($response->responseEnvelope->ack);
                        if ($ack == "SUCCESS") 
                        {
                             $payKey = $response->payKey;
                             $payPalURL = PAYPAL_REDIRECT_URL . '_ap-payment&paykey=' . $payKey;
                             $request->session()->put('payKey', $payKey);
                             $request->session()->put('campaign_id', $data['campaign_id']);
                             $request->session()->put('donation_amnt', $charity_amount);
                             $data["payKey"]=$payKey;
                             unset($data['paypal_email']);
                             $insert_id=Donation::create($data);
                             return   redirect($payPalURL);

                        }

                    } 
                    catch (Exception $ex) {
                     return  redirect()->back()->withMessage("warning","Internal Error in paypal");           
   
                       

                    }
               }
        }
        
        function paysuccess(Request $request)
        {
             include(app_path() . '/Providers/paypal/PPBootStrap.php');
             include(app_path() .'/Providers/paypal/Common/Constants.php');
            $payKey=$request->session()->get('payKey');
            $donation_amnt=$request->session()->get('donation_amnt');
            $campaign_id=$request->session()->get('campaign_id');
            $requestEnvelope = new RequestEnvelope("en_US");
            $paymentDetailsReq = new PaymentDetailsRequest($requestEnvelope);
            $paymentDetailsReq->payKey = $payKey;
            $service = new AdaptivePaymentsService(Configuration::getAcctAndConfig());
            $response = $service->PaymentDetails($paymentDetailsReq);            
            if ($response->status == 'COMPLETED') 
            {
                $campaign=Campaign::where("id","=",$campaign_id)->first();
                $total_bakers=$campaign->total_bakers+1;
                $total_donation=$campaign->total_donation+$donation_amnt;
                $insert=DB::table("donations") 
                 ->where('payKey', $payKey)
                        
                ->update(['is_paid' => 1,'total_bakers'=>$total_bakers,'total_donation'=>$total_donation]);
                
                 return redirect()->action('CampignsController@details',['slug'=>$campaign->slug])->withMessage("Thanks for your helping hand ");
            }
        
            
         }
         
         function payfailure(Request $request)
         {
            $campaign_id=$request->session()->get('campaign_id');
            $campaign=Campaign::where("id","=",$campaign_id)->first();
                return    redirect()->action('CampignsController@details',['slug'=>$campaign->slug])->withMessage("warning","Your payment has been failure");           



         }
         
         function donationlists()
         {
             $user=Auth::user();
             $donations=Donation::where("user_id","=",$user->id)
                                 ->paginate(16);
             $donations->setCollection(
             $donations->getCollection()
            ->map(function($item, $key)
            {
                
                $campaign=Campaign::with('imgpath')
                                    ->with('user')->with('profilephoto')->with('category')
                                    ->where("id","=",$item->campaign_id)->first();
               
                $img_path=Config::get('constants.IMGPATH');
                $item->photo = !empty($campaign->imgpath->path)?$img_path.pathinfo($campaign->imgpath->path, PATHINFO_BASENAME):'';
                $item->username=!$campaign->user->first_name.' '.$campaign->user->last_name;
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
             
             return view('Myprojects/donate',['donations'=>$donations]);

         }
           
        
         
    }
    
    
