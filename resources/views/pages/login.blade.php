@extends('layouts.default')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      @if (\Session::has('success'))
          <div class="alert alert-success">
              <ul>
                  <li>{!! \Session::get('success') !!}</li>
              </ul>
          </div>
      @endif

      {{ $user ?? '' }}
      {!! F::open(['action' =>'App\Http\Controllers\LoginController@login', 'method' => 'POST'])!!}
      {{ csrf_field() }}
          <div class="col-md-6">

             <div class="form-group required">
              {!! F::label("Username") !!}
              {!! F::text("username", null, ["class"=>"form-control","required"=>"required"]) !!}
            </div>
            <div class="form-group required">
               {!! F::label("Password") !!}
               {!! F::password("password", null, ["class"=>"form-control","required"=>"required"]) !!}
            </div>

              <div class="btn">
                  <button type="submit" class="btn btn-success" title="Save">Login</button>
              </div>
          </div>
      {!! F::close() !!}
    </div>
</div>
@stop
