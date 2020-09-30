@extends('layouts.default')
@section('content')
<div class="flex-center position-ref">
    <div class="content">
        <div class="title">
          @if (\Session::has('success'))
              <div class="alert alert-success">
                  <ul>
                      <li>{!! \Session::get('success') !!}</li>
                  </ul>
              </div>
          @endif
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
              @foreach ($contacts as $contact)
                <tr>
                  <td>{{ $contact->name }} {{ $contact->surname }}</td>
                  <td>{{ $contact->dob }}</td>
                  <td>{{ $contact->company }}</td>
                  <td>{{ $contact->position }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>{{ $contact->number }}</td>
                  <td><form action="{{ route('contacts.destroy', $contact->email)}}" method="post">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                  </form></td>
                </tr>
              @endforeach
            </table>
            <div class="page-links">
              {{ $contacts->appends($_GET)->links() }}
            </div>
          </div>
        </div>
    </div>
</div>
@stop
