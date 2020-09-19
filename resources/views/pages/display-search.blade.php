@extends('layouts.default')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
          <form action="{{ asset('display-search')}}" method="GET" role="q">
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search Contacts">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
            </div>
          </form>
          <div class="display-table">
          <table>
              <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Company Name</th>
                <th>Potision</th>
                <th>Email</th>
                <th>Phone Number</th>
              </tr>
              @foreach ($results as $result)
                <tr>
                  <td>{{ $result->name }} {{ $result->sirname }}</td>
                  <td>{{ $result->dob }}</td>
                  <td>{{ $result->company }}</td>
                  <td>{{ $result->position }}</td>
                  <td>{{ $result->email }}</td>
                  <td>{{ $result->number }}</td>
                </tr>
              @endforeach
            </table>
            <div class="page-links">
              {{ $results->appends($_GET)->links() }}
            </div>
          </div>
        </div>
    </div>
</div>
@stop
