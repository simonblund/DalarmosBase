@extends('layouts.app')

@section('content')
<div class="container p-t-6">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} |
                 @if (Auth::user()->is_admin === 1)
                     <b>ADMIN</b>
                @endif
                </div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Epost</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Primär telefon</th>
                            <td>{{ Auth::user()->primary_phone }}</td>
                        </tr>
                        <tr>
                            <th>Sekundär telefon</th>
                            <td>{{ Auth::user()->secondary_phone }}</td>
                        </tr>
                        <tr>
                            <th>Vakans</th>
                            <td>{{ Auth::user()->vacancy }}</td>
                        </tr>
                        <tr>
                            <th>Körkortsklasser</th>
                            <td>{{ Auth::user()->driverslicence }}</td>
                        </tr>
                        <tr>
                            <th>Telegram ID</th>
                            <td>{{ Auth::user()->telegram_id }}</td>
                        </tr>
                        <tr>
                            <th>Gatuadress</th>
                            <td>{{ Auth::user()->street_address }}</td>
                        </tr>
                        <tr>
                            <th>Stad & Postnummer</th>
                            <td>{{ Auth::user()->city_address }} {{ Auth::user()->postcode_address }}</td>
                        </tr>
                        <tr>
                            <th>Land</th>
                            <td>{{ Auth::user()->country_address }}</td>
                        </tr>
                        <tr>
                            <th>Födelsedag</th>
                            <td>{{ Auth::user()->birthday }}</td>
                        </tr>
                        <tr>
                            <th>Brandkår</th>
                            <td>{{ Auth::user()->fire_department }}</td>
                        </tr>
                        
                    </table>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Redigera dina uppgifter</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/user/{{Auth::user()->id}}/edit">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primary_phone') ? ' has-error' : '' }}">
                            <label for="primary_phone" class="col-md-4 control-label">Primär telefonnummer (+358401234567)</label>

                            <div class="col-md-6">
                                <input id="primary_phone" type="text" class="form-control" name="primary_phone" value="{{ Auth::user()->primary_phone }}" required autofocus>

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
                                <input id="secondary_phone" type="text" class="form-control" name="secondary_phone" value="{{ Auth::user()->secondary_phone }}" autofocus>

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
                                <input id="telegram_id" type="text" class="form-control" name="telegram_id" value="{{ Auth::user()->telegram_id }}" autofocus>

                                @if ($errors->has('telegram_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telegram_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                            <label for="street_address" class="col-md-4 control-label">Gatuadress</label>

                            <div class="col-md-6">
                                <input id="street_address" type="text" class="form-control" name="street_address" value="{{ Auth::user()->street_address }}" autofocus>

                                @if ($errors->has('street_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city_address') ? ' has-error' : '' }}">
                            <label for="street_adress" class="col-md-4 control-label">Stad</label>

                            <div class="col-md-6">
                                <input id="city_address" type="text" class="form-control" name="city_address" value="{{ Auth::user()->city_address }}" autofocus>

                                @if ($errors->has('city_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postcode_address') ? ' has-error' : '' }}">
                            <label for="street_adress" class="col-md-4 control-label">Postnummer</label>

                            <div class="col-md-6">
                                <input id="postcode_address" type="text" class="form-control" name="postcode_address" value="{{ Auth::user()->postcode_address }}" autofocus>

                                @if ($errors->has('postcode_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country_address') ? ' has-error' : '' }}">
                            <label for="country_address" class="col-md-4 control-label">Land</label>

                            <div class="col-md-6">
                                <input id="country_address" type="text" class="form-control" name="country_address" value="{{ Auth::user()->country_address }}" autofocus>

                                @if ($errors->has('country_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">Födelsedag</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}" autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Spara
                                </button>
                            </div>
                        </div>
                    </form>
                   <div>
                       <ul>
                           @foreach($errors->all() as $error)
                           <li> {{$error}}</li>
                           @endforeach
                       </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection