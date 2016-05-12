@extends('layouts.app')

@section('dashboard-title')
    <span>Товары</span>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/good.js') }}"></script>
@endsection

@section('content')
	<div id="good-container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="form-group">
				    <label for="good-row-count">Количество товаров на странице</label>
				    <input type="text" name="good-count" class="form-control" id="good-row-count" value='1'>
				</div>
			</div>
		</div>
		<div id="good-table-container">
			@include('goods._table', ['goodPaginate' => $goodPaginate])
		</div>
	</div>
	
@endsection
