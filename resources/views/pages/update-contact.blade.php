@extends('layouts.default')
@section('content')
<div class="content">
  @if (\Session::has('success'))
      <div class="alert alert-success">
          <ul>
              <li>{!! \Session::get('success') !!}</li>
          </ul>
      </div>
  @endif

  {!! F::open(['action' =>['App\Http\Controllers\ContactController@update', $contacts->email], 'method' => 'POST'])!!}
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
      <div class="col-md-6">

  			 <div class="form-group required">
  				{!! F::label("Name") !!}
  				{!! F::text("name", $contacts->name, ["class"=>"form-control","required"=>"required"]) !!}
  			</div>
        <div class="form-group required">
           {!! F::label("Sirname") !!}
           {!! F::text("sirname", $contacts->sirname, ["class"=>"form-control","required"=>"required"]) !!}
        </div>

        <div class="form-group required">
          {!! F::label("Date of birth") !!}
          {!! F::text("dob", $contacts->dob, ["class"=>"form-control","required"=>"required"]) !!}
        </div>

        <div class="form-group required">
         {!! F::label("Company") !!}
         {!! F::text("company", $contacts->company, ["class"=>"form-control","required"=>"required"]) !!}
        </div>

        <div class="form-group required">
         {!! F::label("Position") !!}
         {!! F::text("position", $contacts->position, ["class"=>"form-control","required"=>"required"]) !!}
        </div>

  			 <div class="form-group required">
  				{!! F::label("Email") !!}
  				{!! F::text("email", $contacts->email, ["class"=>"form-control","required"=>"required"]) !!}
  			</div>

  			 <div class="form-group required">
  				{!! F::label("Phone number") !!}
  				{!! F::text("number", $contacts->number, ["class"=>"form-control","required"=>"required"]) !!}
  			</div>

          <div class="btn">
              <button type="submit" class="btn btn-success" title="Save">Update</button>
          </div>
      </div>
  {!! F::close() !!}

  <form action="{{ asset('display-all')}}">
      <button class="btn" type="submit">Back to all results</button>
  </form>
</div>
@endsection
