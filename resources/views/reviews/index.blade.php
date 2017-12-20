@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Reviews</h2>

            @foreach ($reviews as $review)
                <div class="panel panel-default">
                    <div class="panel-heading">Review about {{ $review->owner->fullName() }} </div>

                    <div class="panel-body">

                        <strong>Score: {{ $review->score }}</strong>
                        <div>
                             {{ $review->body }}
                        </div>
                        <small>
                            Written by: {{ $review->creator->fullName() }}
                        </small>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
