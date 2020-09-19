@extends('layouts.default')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
          <form action="{{ asset('/contacts/create') }}">
            <button type="submit" class="btn btn-default">Create new Contact</button>
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
                      <td>{{ $contact->name }} {{ $contact->sirname }}</td>
                      <td>{{ $contact->dob }}</td>
                      <td>{{ $contact->company }}</td>
                      <td>{{ $contact->position }}</td>
                      <td>{{ $contact->email }}</td>
                      <td>{{ $contact->number }}</td>
                    </tr>
                  @endforeach
                </table>
                <div class="page-links">
                  {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
