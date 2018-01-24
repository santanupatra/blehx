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
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Email_Template;

class Email_TemplatesController extends Controller
{
	public $show_action = true;
	public $view_col = 'subject';
	public $listing_cols = ['id', 'subject'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Email_Templates', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Email_Templates', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Email_Templates.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Email_Templates');
		
		if(Module::hasAccess($module->id)) {
			return View('la.email_templates.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new email_template.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created email_template in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Email_Templates", "create")) {
		
			$rules = Module::validateRules("Email_Templates", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
                        $data= $request->all();
                        
                        unset($data['_token']);
                        unset($data['method']);
                        unset($data['_token_112']);
                        unset($data['files']);
			$insert_id = DB::table('email_templates')->insert($data);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.email_templates.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified email_template.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Email_Templates", "view")) {
			
			$email_template = Email_Template::find($id);
			if(isset($email_template->id)) {
				$module = Module::get('Email_Templates');
				$module->row = $email_template;
				
				return view('la.email_templates.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('email_template', $email_template);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("email_template"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified email_template.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Email_Templates", "edit")) {			
			$email_template = Email_Template::find($id);
			if(isset($email_template->id)) {	
				$module = Module::get('Email_Templates');
				
				$module->row = $email_template;
				
				return view('la.email_templates.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('email_template', $email_template);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("email_template"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified email_template in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Email_Templates", "edit")) {
			
			$rules = Module::validateRules("Email_Templates", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
                        
                        $data= $request->all();
                        
                        unset($data['_token']);
                        unset($data['method']);
                        unset($data['_token_112']);
                        unset($data['files']);
                        unset($data['_method']);
                        $insert_id=DB::table('email_templates')
                        ->where('id', $id)
                        ->update($data);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.email_templates.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified email_template from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Email_Templates", "delete")) {
			Email_Template::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.email_templates.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('email_templates')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Email_Templates');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				/*if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/email_templates/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}*/
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Email_Templates", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/email_templates/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Email_Templates", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.email_templates.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
