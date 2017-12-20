@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <h2><i class=""></i> Admin Panel</h2></div><br />
      <div class="row">
      <div class="col-md-5">
      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">User Manager</div>
        <!-- Table -->
        <table class="table">
          <tr>
            <th>Name</th>
            <th>Manage</th>
          </tr>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->fullName() }}
              @if($user->isBanned())
                <span class="label label-danger">Banned</span></td>
              @endif
              @if($user->admin)
                <span class="label label-success">Admin</span></td>
              @endif
            <td><!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class=" glyphicon glyphicon-pencil"></i> Manage <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="{{ route('profile', ['user' => $user->id]) }}">Profile</a></li>
                <li><a href="{{ route('userbantemp', ['user' => $user]) }}">Temporary Ban</a></li>
                <li><a href="{{ route('userban', ['user' => $user]) }}">Permanent Ban</a></li>
                <li><a href="{{ route('userunban', ['user' => $user]) }}">Unban user</a></li>
              </ul>
            </div></td>
          </tr>
        @endforeach
        </table>
      </div></div>
      <div class="col-md-5 col-md-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">New run</div>
        <div class="panel-body">
          Work in progress...
        </div>
      </div></div>
    </div>
    </div>
  @endsection
