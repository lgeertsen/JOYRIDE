@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Add a ride</div>

        <div class="panel-body">
          <form action="/rides" method="post">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="car">Car:</label>
              <input type="text" class="form-control" id="car" name="car" value="{{ old('car') }}" required>
            </div>

            <div class="form-group">
              <label for="model">Model:</label>
              <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
            </div>

            <div class="form-group">
              <label for="color">Color:</label>
              <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}" required>
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
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Map</div>

        <div class="panel-body">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
