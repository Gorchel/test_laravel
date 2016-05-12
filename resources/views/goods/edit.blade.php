@extends('layouts.app')

@section('dashboard-title')
    <span>Редактирование товара "{{ $good->good_name}}"</span>
@endsection

@section('content')
	<div class="row">
		{!! Form::model($good, array('route' => array('good.update', $good->good_id), 'method' => 'PUT')) !!}
			<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
				<label for="good-edit-id">ID</label>
				{!! Form::text('good_id', @$good->good_id,array('class' => 'form-control', 'id'=>'good-edit-id')) !!}
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-5">
				<label for="good-edit-name">Название</label>
				{!! Form::text('good_name', @$good->good_name,array('class' => 'form-control', 'id'=>'good-edit-name')) !!}
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-5">
				<label for="good-edit-price">Цена</label>
				{!! Form::text('good_price', @$good->good_price,array('class' => 'form-control', 'id'=>'good-edit-price')) !!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-8">
				<label for="good-edit-advert">Рекламодатели</label>
				{{ Form::select('good_advert', @$advertList, @$good->advert->user_id,array('class' => 'form-control')) }}
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4">
				{!! Form::submit('Сохранить',array('class' => 'form-control btn btn-success')) !!}
			</div>
		{!! Form::close() !!}
	</div>
@endsection