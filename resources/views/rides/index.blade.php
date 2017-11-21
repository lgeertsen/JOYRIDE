@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Rides</h2>
            
            @foreach ($rides as $ride)
                <div class="panel panel-default">
                    <div class="panel-heading">Ride about {{ $ride->creator->name() }} </div>
    
                    <div class="panel-body">
                        
                        <div>
                            Date: {{ $ride->date }}
                        </div>
                        <div>
                            Hour: {{ $ride->time }}
                        </div>
                        <div>
                            Car: {{ $ride->car->description() }}
                        </div>
                        <div>
                            From: {{ $ride->start }}
                        </div>
                        <div>
                            To: {{ $ride->destination }}
                        </div>

                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection