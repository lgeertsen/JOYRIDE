@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="page-header">
      <h1>
        {{ $profileUser->name() }}
        <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        
        @foreach ($reviews as $review)
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="level">
                <span class="flex">
                  Review from {{ $review->creator->name() }}:
                </span>
    
                <span>Score: {{ $review->score }}</span>
              </div>
            </div>
    
            <div class="panel-body">
              {{ $review->body }}
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
  </div>
@endsection
