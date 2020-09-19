@extends('layouts.default')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      @if(session()->has('username'))
      <div class="title m-b-md">
          <p>Hello, {{ session('username')}}</p>
      </div>
      <form action="{{ asset('logout')}}">
          <button class="btn" type="submit">logout</button>
      </form>
      @else
          <p>Ops, you are not logged in!</p>
          <form action="{{ asset('login')}}">
              <button class="btn" type="submit">Go to login!</button>
          </form>
      @endif
    </div>
</div>
@stop
