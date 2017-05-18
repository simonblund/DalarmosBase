@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Förnamn</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Efternamn</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vacancy') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Vakansnummer</label>

                            <div class="col-md-6">
                                <input id="vacancy" type="text" class="form-control" name="vacancy" value="{{ old('vacancy') }}" required autofocus>

                                @if ($errors->has('vacancy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vacancy') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('driverslicence') ? ' has-error' : '' }}">
                            <label for="driverslicence" class="col-md-4 control-label">Körkort</label>

                            <div class="col-md-6">
                                <input id="driverslicence" type="text" class="form-control" name="driverslicence" value="{{ old('driverslicence') }}" required autofocus>

                                @if ($errors->has('driverslicence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('driverslicence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primary_phone') ? ' has-error' : '' }}">
                            <label for="primary_phone" class="col-md-4 control-label">Primär telefonnummer (+358401234567)</label>

                            <div class="col-md-6">
                                <input id="primary_phone" type="text" class="form-control" name="primary_phone" value="{{ old('primary_phone') }}" required autofocus>

                                @if ($errors->has('primary_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primary_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('secondary_phone') ? ' has-error' : '' }}">
                            <label for="secondary_phone" class="col-md-4 control-label">Sekundär telefonnummer (+358401234567)</label>

                            <div class="col-md-6">
                                <input id="secondary_phone" type="text" class="form-control" name="secondary_phone" value="{{ old('secondary_phone') }}" autofocus>

                                @if ($errors->has('secondary_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telegram_id') ? ' has-error' : '' }}">
                            <label for="telegram_id" class="col-md-4 control-label">Telegram</label>

                            <div class="col-md-6">
                                <input id="telegram_id" type="text" class="form-control" name="telegram_id" value="{{ old('telegram_id') }}" autofocus>

                                @if ($errors->has('telegram_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telegram_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fire_department') ? ' has-error' : '' }}">
                            <label for="fire_department" class="col-md-4 control-label">Brandkår</label>

                            <div class="col-md-6">
                                <input id="fire_department" type="text" class="form-control" name="fire_department" value="{{ env('FIRE_DEPARTMENT') }}" autofocus>

                                @if ($errors->has('fire_department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fire_department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                            <label for="is_admin" class="col-md-4 control-label">Är administratör</label>

                            <div class="col-md-6">
                                
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_admin" id="is_admin" value="0" checked>
                                        NEJ
                                    </label>
                                    </div>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" name="is_admin" id="is_admin" value="1">
                                        JA
                                    </label>
                                    </div>
                                @if ($errors->has('is_admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
