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
use Hash;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\User;

class CharitiesController extends Controller
{
	public $show_action = true;
	public $view_col = 'name';
	public $listing_cols = ['id', 'name', 'email'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Users.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$charities=DB::table("users")->whereNull("deleted_at")->where("type","=","C")->get();
            return view('la/charities/index',['charities'=>$charities,
            ]);
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
        public function edit($id)
	{
		if(Module::hasAccess("Users", "edit")) {			
			$user = User::find($id);
			if(isset($user->id)) {	
				$module = Module::get('Users');
				
				$module->row = $user;
				
				return view('la.charities.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('user', $user);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("user"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

        
        
        
        public function update(Request $request, $id)
	{
		if(Module::hasAccess("Users", "edit")) {
			
			
                        
                            $validator = Validator::make($request->all(), [
                                'first_name' => 'required',
                                'last_name' => 'required',
                                'email' => 'required|email|unique:users,email,'.$id,
                            ]);
        
                            if ($validator->fails()) {

                              return redirect()->back()->withErrors($validator)->withInput();;

                            }
                            
                            $data=$request->all();
                            $data['name']=$data['first_name'].' '.$data['last_name'];
                            
                            unset($data['_method']);
                            unset($data['_token']);
                            if(empty($data["password"]))
                            {
                            unset($data['password']);
                            }
                            else{
                            $data['password']= Hash::make($data['password']);
   
                            }
                            $insert_id = DB::table('users')
                            ->where('id', $id)
                            ->update($data);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.charities.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
        public function destroy($id)
	{
		
                        $data["deleted_at"]= gmdate("Y-m-d H:i:s");
                        $insert_id = DB::table('users')
                            ->where('id', $id)
                            ->update($data);
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.charities.index');
		
	}
        
	
       
        
        function approve($id,$approve)
        {
            $data["is_approve"]=$approve;             
            $insert_id = DB::table('users')
            ->where('id', $id)
            ->update($data);
            return redirect()->back();
            
        }
        
        public function archive()
	{
		$charities=DB::table("users")->whereNotNull("deleted_at")->where("type","=","C")->get();
                
            return view('la/charities/archive',['charities'=>$charities,
            ]);
	}
        function restore($id)
        {
            $data["deleted_at"]=NULL;             
            $insert_id = DB::table('users')
            ->where('id', $id)
            ->update($data);
            return redirect()->back();
            
        }
        
        
        
}
