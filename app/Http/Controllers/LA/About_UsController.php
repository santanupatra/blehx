<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Config;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\Upload;
use App\Models\About_Us;

class About_UsController extends Controller
{
	public function __construct() {
		
	}

	public function index()
	{
		$about_content=About_Us::all();
		$img_path=Config::get('constants.IMGPATH');

		$banner_img=Upload::where('id', '=', $about_content[0]->banner_img)->get();
        $about_content[0]['banner_img']=$img_path.pathinfo($banner_img[0]->path, PATHINFO_BASENAME);

        //echo '<pre>'; print_r($about_content);
		return View('la.about_us.index',array('about_content'=>$about_content[0]));
	}

	public function update(Request $request, $id=null)
	{
		$user=Auth::user();
		$data=$request->all();
		unset($data['_method']);
        unset($data['_token']);
		//echo '<pre>'; print_r($request->all());

		$file=$request->file('bnr_img');
        if(!empty($file))
        {
          $imageName = uniqid().'.'.$file->getClientOriginalExtension();
          $destinationPath = storage_path('/uploads');
          $file->move($destinationPath, $imageName);
          $upload_data["name"]=$file->getClientOriginalName();
          $upload_data["path"]=storage_path().'/uploads/'.$imageName;
          $upload_data["extension"]=$file->getClientOriginalExtension();
          $upload_data["user_id"]=$user->id;
          $upload=Upload::create($upload_data);
          $data["banner_img"]=$upload->id;
          unset($data['bnr_img']);
        }

        $insert_about=DB::table("about_us")
        ->where("id","=",$id)
        ->update($data);

        return redirect()->action('LA\About_UsController@index');
	}



}