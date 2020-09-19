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
          ->orWhere('sirname', 'LIKE', $searchQ . '%')
          ->orWhere('email', 'LIKE', $searchQ . '%')
          ->orWhere('company', 'LIKE', $searchQ . '%')
          ->paginate(5);

      $contacts = $contactsQuery;
      return view('pages/display-search', compact('contacts', 'searchQ'));
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
     $contacts =  Contact::find($email);
     return view('pages/display-all', compact(['contacts']));
  }

  public function edit($email)
  {
     $contacts = Contact::find($email);
     return view('pages/update-contact', compact(['contacts']));
  }

  public function store(Request $request)
  {
          $request->validate([
            'name'=>'required',
            'sirname'=>'required',
            'dob'=>'required',
            'company'=>'required',
            'position'=>'required',
            'email'=>'required',
            'number'=>'required'
          ]);
          $contact = new Contact([
              'name' => $request->get('name'),
              'sirname' => $request->get('sirname'),
              'dob' => $request->get('dob'),
              'company' => $request->get('company'),
              'position' => $request->get('position'),
              'email' => $request->get('email'),
              'number' => $request->get('number')
          ]);
          $contact->save();
          return redirect()->back()->with('success','The new contact has been successfully created');
  }

  public function update(Request $request, $email)
  {
        $request->validate([
            'name'=>'required',
            'sirname'=>'required',
            'dob'=>'required',
            'company'=>'required',
            'position'=>'required',
            'email'=>'required',
            'number'=>'required'
        ]);

        $contact = Contact::find($email);

        $contact->name = $request['name'];
        $contact->sirname = $request['sirname'];
        $contact->dob = $request['dob'];
        $contact->company = $request['company'];
        $contact->position = $request['position'];
        $contact->email = $request['email'];
        $contact->number = $request['number'];
        $contact->save();

        return redirect()->back()->with('success','The new contact has been successfully updated');
  }

  public function destroy($email)
  {
      Contact::where('email', $email)->delete();
      return redirect()->back()->with('success','Contact successfully deleted');
  }
}
