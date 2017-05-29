@extends('layouts.app')

@section('content')
<div class="container p-t-6">
    <div class="row">
        
        <div class="col-md-8">
             @if( Session::has('status'))
                   
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status') }}
                    </div>
                    
                    @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                     API Användare
                </div>

                <div class="panel-body">
                    <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>API namn</th>
                            <th>Typ</th>
                            <th>Ägare</th>
                        </tr>
                        @foreach($api_users as $api_user)
                        <tr>
                            <td>{{ $api_user->api_username }}</td>
                            <td>{{ $api_user->apitypes->name }}</td>
                            <td>{{ $api_user->owner_id }}</td>
                        </tr>
                        @endforeach
                        
                        
                    </table>

                </div>

                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                Skapa ny api-typ
                </div>

                <div class="panel-body">
                   
                   
                   <form class="form-horizontal" role="form" method="POST" action="/admin/api-types/new">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">API-typnamn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required>

                                
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table class="table">
                                <tr>
                                    <th>Åtkomstpunkt</th>
                                    <th>Create</th>
                                    <th>Read</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <td>Fordon</td>
                                    <td><input type="checkbox" name="access_vehicles[]" value="1"></td>
                                    <td><input type="checkbox" name="access_vehicles[]" value="2"></td>
                                    <td><input type="checkbox" name="access_vehicles[]" value="3"></td>
                                    <td><input type="checkbox" name="access_vehicles[]" value="4"></td>
                                </tr>
                                <tr>
                                    <td>Fordonskvitteringar</td>
                                    <td><input type="checkbox" name="access_vehicles_incident[]" value="1"></td>
                                    <td><input type="checkbox" name="access_vehicles_incident[]" value="2"></td>
                                    <td><input type="checkbox" name="access_vehicles_incident[]" value="3"></td>
                                    <td><input type="checkbox" name="access_vehicles_incident[]" value="4"></td>
                                </tr>
                                <tr>
                                    <td>Användaruppgifter</td>
                                    <td><input type="checkbox" name="access_users[]" value="1"></td>
                                    <td><input type="checkbox" name="access_users[]" value="2"></td>
                                    <td><input type="checkbox" name="access_users[]" value="3"></td>
                                    <td><input type="checkbox" name="access_users[]" value="4"></td>
                                </tr>
                                <tr>
                                    <td>Kvitterade användare</td>
                                    <td><input type="checkbox" name="access_under_way[]" value="1"></td>
                                    <td><input type="checkbox" name="access_under_way[]" value="2"></td>
                                    <td><input type="checkbox" name="access_under_way[]" value="3"></td>
                                    <td><input type="checkbox" name="access_under_way[]" value="4"></td>
                                </tr>
                                <tr>
                                    <td>Larm</td>
                                    <td><input type="checkbox" name="access_incident[]" value="1"></td>
                                    <td><input type="checkbox" name="access_incident[]" value="2"></td>
                                    <td><input type="checkbox" name="access_incident[]" value="3"></td>
                                    <td><input type="checkbox" name="access_incident[]" value="4"></td>
                                </tr>
                                <tr>
                                    <td>Larmrapport</td>
                                    <td><input type="checkbox" name="access_incident_report[]" value="1"></td>
                                    <td><input type="checkbox" name="access_incident_report[]" value="2"></td>
                                    <td><input type="checkbox" name="access_incident_report[]" value="3"></td>
                                    <td><input type="checkbox" name="access_incident_report[]" value="4"></td>
                                </tr>
                            </table>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Spara
                                </button>
                            </div>
                        </div>
                        <div>
                       <ul>
                           @foreach($errors->all() as $error)
                           <li> {{$error}}</li>
                           @endforeach
                       </ul>
                   </div>
                   </form>


                </div>
            </div>

            
        </div>

        
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                Skapa ny api-användare
                </div>

                <div class="panel-body">
                   
                   
                   <form class="form-horizontal" role="form" method="POST" action="/admin/api-users/new">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group{{ $errors->has('api_username') ? ' has-error' : '' }}">
                            <label for="api_username" class="col-md-4 control-label">API-namn</label>

                            <div class="col-md-6">
                                <input id="api_username" type="text" class="form-control" name="api_username" value="" required>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('owner_id') ? ' has-error' : '' }}">
                            <label for="owner_id" class="col-md-4 control-label">Ägare</label>

                            <div class="col-md-6">
                                <select class="form-control" name="owner_id">
                                    @foreach($admins as $admin)
                                    <option value="{{$admin->id}}">{{$admin->first_name}} {{$admin->last_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('APIType_id') ? ' has-error' : '' }}">
                            <label for="expiration_time" class="col-md-4 control-label">API-typ</label>

                            <div class="col-md-6">
                                <select class="form-control" name="APIType_id">
                                    @foreach($api_types as $api_type)
                                    <option value="{{$api_type->id}}">{{$api_type->name}}</option>
                                    @endforeach
                                </select>
                                
                           
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-post</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('primary_phone') ? ' has-error' : '' }}">
                            <label for="primary_phone" class="col-md-4 control-label">Telefonnummer</label>

                            <div class="col-md-6">
                                <input id="primary_phone" type="phone" class="form-control" name="primary_phone" value="" required>

                                
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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Lösenord</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Bekräfta lösenord</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Spara
                                </button>
                            </div>
                        </div>
                        <div>
                       <ul>
                           @foreach($errors->all() as $error)
                           <li> {{$error}}</li>
                           @endforeach
                       </ul>
                   </div>
                   </form>


                </div>
            </div>
        </div>

        

    </div>
</div>
@endsection