@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Add a car</div>

        <div class="panel-body">
          <form action="/cars" method="post">
            {{ csrf_field() }}
            
            <div class="form-group">
              <label for="brand">Brand:</label>
              <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
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
  </div>
</div>
@endsection
