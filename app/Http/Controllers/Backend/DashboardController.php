<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	return View::make('backend.dashboard.index');
    }
    public function data_chart()
    {

    	$count_home = \App\Count::where('content', '/') ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))->count();
    	$count_login = \App\Count::where('content', '/login') ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))->count();
    	$year = date("Y"); 

    	$data = array(
    		'count_home' => $count_home,
    		'count_login' => $count_login,
    		'year' => $year,
    	 );
    	return $data;
    }
}
