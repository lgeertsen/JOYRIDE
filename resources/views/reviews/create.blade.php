@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">

        @if ($user->id != Auth::user()->id)

          <div class="panel-heading">Write a review about {{ $user->fullName() }}</div>

          <div class="panel-body">
            <form action="/reviews" method="post">
              {{ csrf_field() }}

              <input name="user_id" type="hidden" value="{{ $user->id }}">

              <div class="form-group">
                <label for="score">Score:</label>
                <select class="form-control" id="score" name="score" required>
                  <option value="">Choose One...</option>
                  @for ($i = 1; $i < 11; $i++)
                    <option value="{{ $i }}" {{ old('score') == $i ? 'selected' : '' }}>
                      {{ $i }}
                    </option>
                  @endfor
                </select>
              </div>

              <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="body" class="form-control" rows="8" required>{{ old('body') }}</textarea>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>

              @if (count($errors))
              <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              @endif
            </form>
          </div>

        @else

          <div class="panel-body">
            You can't write a review about yourself
          </div>

        @endif

      </div>
    </div>
  </div>
</div>
@endsection
