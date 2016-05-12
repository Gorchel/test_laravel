<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\State;
use App\Order;
use App\Good;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {	
    	if($request->ajax()){
    		$orderPaginate = $this->orderFilter($request->input('date-from'),$request->input('date-before'),$request->input('state'),$request->input('phone'),$request->input('goods'),$request->input('good-id'),$request->input('order-count'),$request->input('search'));
    		return view('orders._table',['orderPaginate' => $orderPaginate]);
    	}else{
    		$stateList = State::all();
	    	$goodsList = Good::all();
	    	$orderList = Order::all();
	    	$orderPaginate = Order::paginate(1);

	        return view('orders.index',['stateList' => $stateList,'goodsList' => $goodsList,'orderList' => $orderList,'orderPaginate' => $orderPaginate]);
    	}
    }

    public function orderFilter($dateFrom, $dateBefore, $state, $phone, $good, $goodId, $rowCount, $search){

    	$dateBetween = [$dateFrom, $dateBefore];
    	$orderListFilter = Order::query();
    	$orderListFilter->whereBetween('order_add_time',$dateBetween);

    	if ($state != 0){
    		$orderListFilter->whereHas('state', function($q) use ($state) {
    			$q->where('state_id',$state);
    		});
    	}

    	if ($phone != 0){
    		$orderListFilter->where('order_id', $phone);
    	}

    	if ($good != 0){
    		$orderListFilter->whereHas('good', function($q) use ($good) {
    			$q->where('good_id',$good);
    		});
    	}

    	if ($goodId != 0){
    		$orderListFilter->whereHas('good', function($q) use ($goodId) {
    			$q->where('good_id',$goodId);
    		});
    	}

    	if ($search){
    		$dateSearch = strtotime($search);
    		$search = trim($search);
    		
    		$orderListFilter->where('order_client_phone', $search)
    						->orWhere('order_client_name', $search)
    						->orWhereHas('state', function($q) use ($search)
							{
							    $q->where('state_name', $search);

							})
							->orWhereHas('good', function($q) use ($search)
							{
							    $q->where('good_name', $search);

							})
							->orWhere(function($query) use ($search,$dateSearch) {
								if ($dateSearch){
					    			$query->whereDate('order_add_time','=',date('Y-m-d',$dateSearch));
					    		}
							});			
    	}

    	return $orderListFilter->paginate($rowCount);
    }
}
