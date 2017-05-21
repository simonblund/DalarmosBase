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
                     Roller
                </div>

                <div class="panel-body">
                    <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Roll</th>
                            <th>Shortcode</th>
                            <th>Tid före uppdatering</th>
                        </tr>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->shortcode }}</td>
                            <td>{{ $role->expiration_time }}</td>
                        </tr>
                        @endforeach
                        
                        
                    </table>

                </div>

                </div>
            </div>
            @foreach($roles as $role)
            <div class="panel panel-default">
                <div class="panel-heading">
                {{ $role->name }}
                
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#role_users_{{ $role->shortcode }}" aria-controls="role_users_{{ $role->name }}" role="tab" data-toggle="tab">Rollinnehavare</a></li>
                    <li role="presentation"><a href="#add_users_{{ $role->shortcode }}" aria-controls="add_users_{{ $role->shortcode }}" role="tab" data-toggle="tab">Lägg till eller ta bort innehav</a></li>
                </ul>

                <div class="panel-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="role_users_{{ $role->shortcode }}">
                            <table class="table">
                                <tr>
                                    <th>Vakans</th>
                                    <th>Förnamn</th>
                                    <th>Efternamn</th>
                                </tr>
                                @foreach($role->role_owners as $role_owner)
                                <tr>
                                    <td>{{$role_owner->vacancy}}</td>
                                    <td>{{$role_owner->first_name}}</td>
                                    <td>{{$role_owner->last_name}}</td>
                                </tr>
                                @endforeach

                            </table>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="add_users_{{ $role->shortcode }}">
                            <form class="form-horizontal" role="form" method="POST" action="/admin/roles/{{ $role->id }}/add">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="col-sm-offset-1 col-sm-11">
                                <div class="form-group">
                                    @foreach($users as $user)
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="role_owners[]" value="{{$user->id}}"> {{$user->last_name}}, {{$user->first_name}}
                                        </label>
                                    </div>
                                    @endforeach
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



            @endforeach
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                Skapa ny roll
                </div>

                <div class="panel-body">
                   
                   
                   <form class="form-horizontal" role="form" method="POST" action="/admin/roles/new">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Rollens namn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shortcode') ? ' has-error' : '' }}">
                            <label for="shortcode" class="col-md-4 control-label">Shortcode</label>

                            <div class="col-md-6">
                                <input id="shortcode" type="text" class="form-control" name="shortcode" value="" required>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('expiration_time') ? ' has-error' : '' }}">
                            <label for="expiration_time" class="col-md-4 control-label">Hållbar (dagar)</label>

                            <div class="col-md-6">
                                <input id="expiration_time" type="numbers" class="form-control" name="expiration_time" value="" required>

                                
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