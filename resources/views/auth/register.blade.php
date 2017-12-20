@extends('layouts.app')

@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('customJS')
  <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $('#birthday').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', weekStart : 1, time: false, maxDate : new Date() });
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Register</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}

              <div class="list-group">
                <div class="list-group-item">
                  <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                    <label for="firstName" class="col-md-4 control-label">First Name</label>

                    <div class="col-md-6">
                      <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required autofocus>

                      @if ($errors->has('firstName'))
                        <span class="help-block">
                          <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                    <label for="lastName" class="col-md-4 control-label">Last Name</label>

                    <div class="col-md-6">
                      <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required>

                      @if ($errors->has('lastName'))
                        <span class="help-block">
                          <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="list-group-item">
                  <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                    <label for="birthday" class="col-md-4 control-label">Date of birth</label>

                    <div class="col-md-6">
                      <input id="birthday" type="text" class="form-control" name="birthday" value="{{ old('birthday') }}" required>

                      @if ($errors->has('birthday'))
                        <span class="help-block">
                          <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">Address</label>

                    <div class="col-md-6">
                      <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                      @if ($errors->has('address'))
                        <span class="help-block">
                          <strong>{{ $errors->first('address') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="list-group-item">
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                        <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Telephone number</label>

                    <div class="col-md-6">
                      <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required>

                      @if ($errors->has('telephone'))
                        <span class="help-block">
                          <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="list-group-item">
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password" required>

                      @if ($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>
                </div>
              </div>





              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
