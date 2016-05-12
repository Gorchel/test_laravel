@extends('layouts.app')

@section('dashboard-title')
    <span>Выберите раздел</span>
@endsection


@section('content')
	<p><a href="{{ action('OrderController@index') }}">Заказы</a></p>
  	<p><a href="{{ action('GoodController@index') }}">Товары</a></p> 
                            
@endsection
