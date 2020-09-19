@extends('layouts.default')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
          <p> You can search for first name, last name, email or a company name. </p>
          <p>I originally set the param to % ? %, but to narrow results down results showing is what the search starts with.</p>
          <br>
          <form action="{{ asset('display-search')}}" method="GET" role="q">
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search Contacts">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
            </div>
          </form>
        </div>
    </div>
</div>
@stop
