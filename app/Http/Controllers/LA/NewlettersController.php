<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Mail;

use App\Models\Site_Setting;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;


use App\Models\Campaign;

class NewlettersController extends Controller
{
	
	public function __construct() {
		// Field Access of Listing Columns
		
	}
        public function index() 
        {
            
            $subscribers=DB::table("subscribers")->whereNull('deleted_at')->get();
            return View('la.newsletters.index', [
				
                                "subscribers"=>$subscribers,
			]);
            
        }
	
        function sendnewsletter(Request $request)
        {
          if ($request->isMethod('post')) {   
          $data=$request->all();
          if(!empty($data["all"]))
          {
             $subscribers=DB::table("subscribers")->whereNull('deleted_at')->get();
             foreach ($subscribers as $subscribe)
             {   
              $users[]=$subscribe->email;
             }
          }
          else{
           $users= $data["subscribers"];  
          }
          foreach($users as $user)
          {
            $site_setting=Site_Setting::first();          
            $msg= $data["content"]; 
            $html = array('from' => $site_setting->admin_email, 'to' => $user,'subject'=>"Admin Newletter",
                         'content'=>$msg   
               );
           Mail::send(array(),array(), function ($message) use ($html) {
            $message->to($html['to'])
              ->subject($html['subject'])
              ->from($html['from'])
              ->setBody($html['content'], 'text/html');
          });
          }
          
        return redirect()->back()->with('message', 'Newsletter has been send !');
          }

              
          
          
          

            
        }
        
	/**
	 * Display a listing of the Campaigns.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
}
