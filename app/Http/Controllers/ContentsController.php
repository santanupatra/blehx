<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\Response;
use Auth;
use DB;
use App\Models\How_It_Work;
use App\Models\About_Us;
use App\Models\upload;
use Config;
use App\Http\Requests;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $img_path=Config::get('constants.IMGPATH');
        $about_us=About_Us::where("id","=",1)
                ->first();

        $banner_img=Upload::where('id', '=', $about_us->banner_img)->get();
        $about_us['banner_img']=$img_path.pathinfo($banner_img[0]->path, PATHINFO_BASENAME);
        //echo '<pre>'; print_r($about_us);

        return view('Contents/about', compact('about_us'));
    }
    
    public function howit()
    {
        $img_path=Config::get('constants.IMGPATH');
        $how_it_work=How_It_Work::where("id","=",1)
                ->first();

        $new1=Upload::where('id', '=', $how_it_work->image2)->get();
        $new2=Upload::where('id', '=', $how_it_work->image3)->get();
        $new3=Upload::where('id', '=', $how_it_work->image4)->get();
        $new4=Upload::where('id', '=', $how_it_work->image5)->get();
        $new5=Upload::where('id', '=', $how_it_work->image6)->get();
        $new6=Upload::where('id', '=', $how_it_work->image7)->get();
        $new7=Upload::where('id', '=', $how_it_work->banner_img)->get();



        $how_it_work['image2']=$img_path.pathinfo($new1[0]->path, PATHINFO_BASENAME);
        $how_it_work['image3']=$img_path.pathinfo($new2[0]->path, PATHINFO_BASENAME);
        $how_it_work['image4']=$img_path.pathinfo($new3[0]->path, PATHINFO_BASENAME);
        $how_it_work['image5']=$img_path.pathinfo($new4[0]->path, PATHINFO_BASENAME);
        $how_it_work['image6']=$img_path.pathinfo($new5[0]->path, PATHINFO_BASENAME);
        $how_it_work['image7']=$img_path.pathinfo($new6[0]->path, PATHINFO_BASENAME);
        $how_it_work['banner_img']=$img_path.pathinfo($new7[0]->path, PATHINFO_BASENAME);
       
        //echo '<pre>'; print_r($how_it_work); die;
        return view('Contents/howit',compact("how_it_work"));
    }
    
    public function ourOffer()
    {
        return view('Contents/our_offer');
    }

    public function services()
    {
        return view('Contents/services');
    }

    public function datacenter()
    {
        return view('Contents/datacenter');
    }
    
   

}