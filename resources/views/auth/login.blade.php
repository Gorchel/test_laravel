@extends('layouts.app')

@section('dashboard-title')
    <span>Логин</span>
@endsection

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('user_login') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Логин</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="user_login" value="{{ old('user_login') }}">

                @if ($errors->has('login'))
                    <span class="help-block">
                        <strong>{{ $errors->first('login') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('user_password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Пароль</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="user_password">

                @if ($errors->has('user_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i>Вход
                </button>
            </div>
        </div>
    </form>
@endsection
