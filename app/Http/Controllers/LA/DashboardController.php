<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
         $donation = DB::table('donations')
                ->where('is_paid','=', 1)
                ->whereNull('deleted_at')
                ->sum('admin_amount');
         $total_user = DB::table('users')
                ->whereNull('deleted_at')
                 ->where('id','<>',1)
                ->count();
         
         $active_user = DB::table('users')
                ->whereNull('deleted_at')
                 ->where('id','<>',1)
                 ->where('is_active','=',1)
                ->count("id");
         $inactive_user = DB::table('users')
                ->whereNull('deleted_at')
                 ->where('id','<>',1)
                 ->where('is_active','=',0)
                ->count("id");
         
        
         
         
        return view('la.dashboard',['donation'=>$donation,'total_user'=>$total_user,
            "active_user"=>$active_user,"inactive_user"=>$inactive_user
            ]);
    }
    
    public function sales()
    {
        $years=array(
         2017,2018,2019,2019,2020,2021,2022,2023,2024    
         );
         $chart=array();
         foreach ($years as $year)
         {
            $total_donation = DB::table('donations')
                ->where('is_paid', 1)
                ->whereYear('created_at', '=', $year)                
                ->whereNull('deleted_at')
                ->sum('admin_amount');
            $charts[]=array('y'=>(string)$year,'a'=> (int)round($total_donation));
         }
         
         $reports=array();
         foreach ($years as $year)
         {
            $total_user = DB::table('users')
                ->whereYear('created_at', '=', $year)  
                 ->where('id','<>',1)
                ->whereNull('deleted_at')
                ->count('id');
            $reports[]=array('y'=>(string)$year,'a'=> (int)round($total_user));
         }
         
         
         
         
         echo json_encode(array('charts'=>$charts,'userreports'=>$reports));exit;
    }
    
     
    
}