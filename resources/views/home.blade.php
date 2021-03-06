@extends('layouts.app')

@section('content')
<div class="container p-t-6">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $incident->type }} | {{ $incident->time }}</div>

                <div class="panel-body">
                    {{ $incident->message }}
                    {{ $incident->details }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Kvitterade</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Vakans</th>
                            <th>Efternamn</th>
                            <th>RD</th>
                            <th>Körkort</th>
                            <th>Kvitterad</th>
                            <th>Tid till ankomst</th>
                        </tr>
                        <tr>
                            <td>65SB</td>
                            <td>Blomsterlund</td>
                            <td>RD</td>
                            <td>C</td>
                            <td>18:04</td>
                            <td>18:14</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
