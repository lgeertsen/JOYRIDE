@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="">
            <h2>Your cars</h2>
            <a href="/cars/new" class="btn btn-success">
              Add car
            </a>
          </div>

            @forelse ($cars as $car)
                <div class="panel panel-default">
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
            @empty
              <h3>You haven't added any cars yet. Come on and <a href="/cars/new">add one</a></h3>
            @endforelse

        </div>
    </div>
</div>
@endsection
