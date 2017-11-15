@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Cars</h2>
            
            @foreach ($cars as $car)
                <div class="panel panel-default">
                    <div class="panel-heading">Car of {{ $car->owner->name() }} </div>
    
                    <div class="panel-body">
                        
                        <div>
                            Brand: {{ $car->brand }}
                        </div>
                        <div>
                            Model: {{ $car->model }}
                        </div>
                        <div>
                            Color: {{ $car->color }}
                        </div>

                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
