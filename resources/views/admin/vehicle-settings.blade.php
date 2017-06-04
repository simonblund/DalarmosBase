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
                     Fordon
                </div>

                <div class="panel-body">
                    <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Fordon</th>
                            <th>Kortnamn</th>
                            <th>Telefonnummer</th>
                            <th>Sittplatser</th>
                            <th>Körkort</th>
                            <th>Årsmodell</th>
                        </tr>
                        @foreach($vehicles as $veh)
                        <tr>
                            <td>{{ $veh->name }}</td>
                            <td>{{ $veh->shortcode }}</td>
                            <td>{{ $veh->phone }}</td>
                            <td>{{ $veh->seats }}</td>
                            <td>{{ $veh->drivers_license }}</td>
                            <td>{{ $veh->year }}</td>
                        </tr>
                        @endforeach
                        
                        
                    </table>

                </div>

                </div>
            </div>
        </div>

        
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                Skapa nytt fordon
                </div>

                <div class="panel-body">
                   
                   
                   <form class="form-horizontal" role="form" method="POST" action="/admin/vehicles/new">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Fordonsnamn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shortcode') ? ' has-error' : '' }}">
                            <label for="shortcode" class="col-md-4 control-label">Kortnamn</label>

                            <div class="col-md-6">
                                <input id="shortcode" type="text" class="form-control" name="shortcode" value="" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telefonnummer</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="" required>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('seats') ? ' has-error' : '' }}">
                            <label for="seats" class="col-md-4 control-label">Sittplatser</label>

                            <div class="col-md-6">
                                <input id="seats" type="number" class="form-control" name="seats" value="" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="priority" class="col-md-4 control-label">Prioritet lägre är högre</label>

                            <div class="col-md-6">
                                <input id="priority" type="number" class="form-control" name="priority" value="" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('drivers_license') ? ' has-error' : '' }}">
                            <label for="drivers_license" class="col-md-4 control-label">Körkortsklass</label>

                            <div class="col-md-6">
                                <input id="drivers_license" type="text" class="form-control" name="drivers_license" value="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Beskrivning</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vehicle_registration') ? ' has-error' : '' }}">
                            <label for="vehicle_registration" class="col-md-4 control-label">Registreringsnummer</label>

                            <div class="col-md-6">
                                <input id="vehicle_registration" type="text" class="form-control" name="vehicle_registration" value="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Inköpsår</label>

                            <div class="col-md-6">
                                <input id="year" type="year" class="form-control" name="year" value="">
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