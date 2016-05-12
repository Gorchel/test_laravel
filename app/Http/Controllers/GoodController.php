<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\State;
//use App\Order;
use App\Good;

use App\Http\Requests;

class GoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(Request $request)
    {	
    	if($request->ajax()){

    	}else{
	    	$goodsList = Good::all();
	    	$goodPaginate = Good::paginate(1);

	        return view('goods.index',['goodsList' => $goodsList,'goodPaginate' => $goodPaginate]);
    	}
}
