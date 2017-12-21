@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="page-header level">
      <h1 class="flex">
        {{ $profileUser->fullName() }}
        @if(!$reviews->isEmpty())
          <small>Score: {{ $profileUser->score() }}</small>
        @endif
      </h1>
      @if($profileUser->id != auth()->id())
        <a href="/reviews/{{ $profileUser->id }}/new" class="btn btn-success pull-right">Write Review</a>
      @endif
    </div>

    <div class="row">
      <div class="col-md-6">

        <div class="list-group">
          @forelse ($reviews as $review)
            <div class="list-group-item">
              <h4>
                Review from {{ $review->creator->fullName() }}:
              </h4>
              <div class="level">
                <span class="flex mr-1">
                  {{ $review->body }}
                </span>

                <h2>{{ $review->score }}</h2>
              </div>

            </div>
          @empty
            <div class="list-group-item">
              @if($profileUser->id == auth()->id())
                <h4>There are no reviews about you yet.</h4>
              @else
                <h4>There are no reviews about this user yet.</h4>
              @endif
            </div>
          @endforelse

        </div>
      </div>

      <div class="col-md-6">
        <div class="list-group">
          <div class="list-group-item">
            <h4>{{ $profileUser->fullName() }}'s cars</h4>
            @if($profileUser->id == auth()->id())
              <a href="/cars/new" class="btn btn-success btn-xs">Add Car</a>
            @endif
          </div>
          @forelse ($cars as $car)
            <car :attributes="{{ $car }}" inline-template v-cloak>
              <div class="list-group-item">
                {{-- <h5>{{ $car->description() }}</h5> --}}


                <div v-if=editing>
                  <div class="form-group">
                    <input type="text" class="form-control" v-model="color"></input>
                    <input type="text" class="form-control" v-model="brand"></input>
                    <input type="text" class="form-control" v-model="model"></input>
                  </div>

                  <button class="btn btn-xs btn-primary" @click="update">Update</button>
                  <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
                  <hr>
                </div>

                <div v-else v-text="description"></div>

                @can ('update', $car)
                  <div class="level">
                    <button class="btn btn-xs mr-1 btn-warning" @click="editing = true">Edit</button>
                    <button class="btn btn-xs btn-danger" @click="destroy">Delete</button>
                  </div>
                @endcan
              </div>
            </car>
            <form action="/cars/{{ $car->id }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-link">Delete</button>
            </form>
          @empty
            <div class="list-group-item">
              @if($profileUser->id == auth()->id())
                You haven't registered any cars yet.
              @else
                {{ $profileUser->fullName() }} hasn't registered any cars yet.
              @endif
            </div>
          @endforelse

        </div>

        <div class="list-group">
          <div class="list-group-item">
            <h4>{{ $profileUser->fullName() }}'s rides</h4>
            @if($profileUser->id == auth()->id())
              <a href="/rides/new" class="btn btn-success btn-xs">Add Ride</a>
            @endif
          </div>
          @forelse ($rides as $ride)
            <ride :attributes="{{ $ride }}" inline-template v-cloak>
              <div class="list-group-item">
                <h5>From {{ $ride->start }} to {{ $ride->destination }} on {{ $ride->date }}</h5>
                <div class="level">
                  <a href="{{ route('ride.show', ['user' => $ride->creator->id, 'ride' => $ride->id]) }}" class="btn btn-xs btn-primary mr-1">Show</a>
                  @can ('update', $car)
                    <button class="btn btn-xs btn-danger" @click="destroy">Delete</button>
                  @endcan
                </div>
              </div>
            </ride>
            <form action="/rides/{{ $ride->id }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-link">Delete</button>
            </form>
          @empty
            <div class="list-group-item">
              @if($profileUser->id == auth()->id())
                You haven't created any rides yet.
              @else
                {{ $profileUser->fullName() }} hasn't created any rides yet.
              @endif
            </div>
          @endforelse

        </div>
      </div>
    </div>
  </div>
  @endsection
