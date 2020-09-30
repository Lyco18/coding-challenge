<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Contact;

class ContactController extends Controller
{
  public function index()
  {
      $contacts = Contact::all();

      return view('pages/display-all', compact('contacts'));
  }

  public function showSearch()
  {
      $searchQ = $_GET['q'];

      $contactsQuery = DB::table('contacts')
          ->where('name', 'LIKE', $searchQ . '%')
          ->orWhere('surname', 'LIKE', $searchQ . '%')
          ->orWhere('email', 'LIKE', $searchQ . '%')
          ->orWhere('company', 'LIKE', $searchQ . '%')
          ->paginate(5);

      $contacts = $contactsQuery;
      return view('pages/display-all', compact('contacts', 'searchQ'));
  }

  public function list()
  {
      $contacts = DB::table('contacts')->paginate(5);
      return view('pages/display-all', compact('contacts'));
  }


  public function create()
  {
      return view('pages/create-contact');
  }

  public function show($email)
  {
     $contacts =  Contact::find($id);
     return view('pages/display-all', compact('contacts'));
  }

  public function edit($id)
  {
     $contacts = Contact::find($id);
     return view('pages/update-contact', compact('contacts'));
  }

  public function store(Request $request)
  {
          $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'dob'=>'required',
            'company'=>'required',
            'position'=>'required',
            'email'=>'required',
            'number'=>'required'
          ]);
          $contact = new Contact([
              'name' => $request->get('name'),
              'surname' => $request->get('surname'),
              'dob' => $request->get('dob'),
              'company' => $request->get('company'),
              'position' => $request->get('position'),
              'email' => $request->get('email'),
              'number' => $request->get('number')
          ]);
          $contact->save();
          return redirect()->back()->with('success','The new contact has been successfully created');
  }

  public function update(Request $request, $id)
  {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'dob'=>'required',
            'company'=>'required',
            'position'=>'required',
            'email'=>'required',
            'number'=>'required'
        ]);

        $contact = Contact::find($id);

        $contact->name = $request['name'];
        $contact->surname = $request['surname'];
        $contact->dob = $request['dob'];
        $contact->company = $request['company'];
        $contact->position = $request['position'];
        $contact->email = $request['email'];
        $contact->number = $request['number'];
        $contact->save();

        return redirect()->back()->with('success','The new contact has been successfully updated');
  }

  public function destroy($id)
  {
      Contact::where('id', $id)->delete();
      return redirect()->back()->with('success','Contact successfully deleted');
  }
}
