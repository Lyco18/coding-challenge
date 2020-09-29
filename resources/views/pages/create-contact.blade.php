@extends('layouts.default')
@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif


{!! F::open(['action' =>'App\Http\Controllers\ContactController@store', 'method' => 'POST'])!!}

    <div class="col-md-6">
       {!! csrf_field() !!}

			 <div class="form-group required">
				{!! F::label("Name") !!}
				{!! F::text("name", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>
      <div class="form-group required">
         {!! F::label("Surname") !!}
         {!! F::text("surname", null ,["class"=>"form-control","required"=>"required"]) !!}
      </div>

      <div class="form-group required">
        {!! F::label("Date of birth") !!}
        {!! F::date("dob", null ,["class"=>"form-control","required"=>"required"]) !!}
      </div>

      <div class="form-group required">
       {!! F::label("Company") !!}
       {!! F::text("company", null ,["class"=>"form-control","required"=>"required"]) !!}
      </div>

      <div class="form-group required">
       {!! F::label("Position") !!}
       {!! F::text("position", null ,["class"=>"form-control","required"=>"required"]) !!}
      </div>

			 <div class="form-group required">
				{!! F::label("Email") !!}
				{!! F::email("email", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! F::label("Phone number") !!}
				{!! F::text("number", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

      <div class="btn">
          <button type="submit" class="btn btn-success" title="Save">Create</button>
      </div>
  </div>

{!! F::close() !!}
@endsection
