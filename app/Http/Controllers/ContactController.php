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
}
