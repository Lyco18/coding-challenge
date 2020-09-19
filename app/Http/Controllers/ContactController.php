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

      $dataQuery = DB::table('contacts')
          ->where('name', 'LIKE', $searchQ . '%')
          ->orWhere('sirname', 'LIKE', $searchQ . '%')
          ->orWhere('email', 'LIKE', $searchQ . '%')
          ->orWhere('company', 'LIKE', $searchQ . '%')
          ->paginate(5);

      $results = $dataQuery;
      return view('pages/display-search', compact('results', 'searchQ'));
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


        Contact::where('email',$email)->update($request->all());
        return redirect()->back()->with('success','Update Successfully');
  }

  public function destroy($email)
  {
      Contact::where('email',$email)->delete();
      return redirect()->back()->with('success','Delete Successfully');
  }
}
