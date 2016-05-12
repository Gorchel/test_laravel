@extends('layouts.app')

@section('dashboard-title')
    <span>Заказы</span>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/order.js') }}"></script>
@endsection

@section('content')

	<div id="order-filter-container">
		<form id="order-filter-form">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-date-from">От</label>
					    <input type="date" name="date-from" class="form-control" id="order-filter-date-from" value="<?php echo date('Y-m-d',strtotime('1993-01-01')) ?>">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-date-before">До</label>
					    <input type="date" name="date-before" class="form-control" id="order-filter-date-before" value="<?php echo date('Y-m-d') ?>">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-date-state">Статус</label>
					    <select name="state" id="order-filter-date-state" class="form-control">
							<option value="0" selected>Выберите статус</option> 
							@foreach ($stateList as $state)
						 		<option value="{{$state->state_id}}">{{$state->state_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<input type="button" class="btn btn-info form-control" id="order-filter-submit" value="Показать">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-phone">Телефон</label>
					    <select name="phone" id="order-filter-phone" class="form-control">
							<option value="0" selected>Выберите телефон</option> 
							@foreach ($orderList as $order)
						 		<option value="{{$order->order_id}}">{{$order->order_client_phone}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="form-group">
					    <label for="order-filter-goods">Товар</label>
					    <select name="goods" id="order-filter-goods" class="form-control">
							<option value="0" selected>Выберите товар</option> 
							@foreach ($goodsList as $good)
						 		<option value="{{$good->good_id}}">{{$good->good_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-id-good">ID Товара</label>
					    <select name="good-id" id="order-filter-id-good" class="form-control">
							<option value="0" selected>Выберите ID товара</option> 
							@foreach ($goodsList as $good)
						 		<option value="{{$good->good_id}}">{{ $good->good_id }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-order-count">Количество товаров на странице</label>
					    <input type="text" name="order-count" class="form-control" id="order-filter-order-count" value='1'>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-offset-6 col-lg-3">
					<div class="form-group">
					    <label for="order-filter-search">Поиск</label>
					    <input type="text" name="search" class="form-control" id="order-filter-search">
					</div>
				</div>
			</div>
		</form>
		<div id="order-table-container">
			@include('orders._table', ['orderPaginate' => $orderPaginate])
		</div>
	</div>
	
@endsection
