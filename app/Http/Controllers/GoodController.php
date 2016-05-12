<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Good;
use App\Advert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class GoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(Request $request)
    {	
    	if($request->ajax()){
    		$paginateQuery = Good::query();

    		if($request->input('sort')){
    			$paginateQuery->orderBy('good_name', 'asc');
    		}

    		$goodPaginate = $paginateQuery->paginate($request->input('good-count'));
    		return view('goods._table',['goodPaginate' => $goodPaginate]);
    	}else{

	    	$goodPaginate = Good::paginate(1);
	    	return view('goods.index',['goodPaginate' => $goodPaginate]);
    	}
    }

    public function edit($id)
    {   
        $good = Good::find($id);
        $adverts = Advert::all();
        $advertList = array();
        foreach ($adverts as $advert){
        	$advertList += array($advert->user_id => $advert->user_first_name);
        }
        return view('goods.edit', ['good' => $good,'advertList' => $advertList]); 
    }

    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'good_id'  => 'required|numeric',
            'good_name'       => 'required',
            'good_price'       => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return redirect()->back();
        } else {
            // store
            $good = Good::find($id);
            $good->good_id = Input::get('good_id');
            $good->good_name = Input::get('good_name');
            $good->good_price = Input::get('good_price');
            $good->good_advert = Input::get('good_advert');
            $good->save();

            return Redirect::to('good');
        }
    }
}
