@extends('layouts.app')

@section('content')
<div class="container p-t-6">
    <div class="row">
        <div class="col-md-8">
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
            <div class="panel panel-default">
                <div class="panel-heading">Redigera dina uppgifter</div>

                <div class="panel-body">
                    
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
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                Skapa ny roll
                </div>

                <div class="panel-body">
                    @if( Session::has('status'))
                   
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status') }}
                    </div>
                    
                    @endif
                   
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