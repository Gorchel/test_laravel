@extends('layouts.app')

@section('dashboard-title')
    <span>Регистрация</span>
@endsection

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}

       <div class="form-group{{ $errors->has('user_first_name') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Имя</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="user_first_name" value="{{ old('user_first_name') }}">

                @if ($errors->has('user_first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('user_last_name') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Фамилия</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="user_last_name" value="{{ old('user_last_name') }}">

                @if ($errors->has('user_last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('user_login') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Логин</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="user_login" value="{{ old('user_login') }}">

                @if ($errors->has('user_login'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_login') }}</strong>
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

        <div class="form-group{{ $errors->has('user_password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Повторите пароль</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="user_password_confirmation">

                @if ($errors->has('user_password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Register
                </button>
            </div>
        </div>
    </form>
@endsection
