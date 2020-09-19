<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
  public function index()
  {
      $contacts = Contact::all();

      return view('pages/display-all', compact('contacts'));
  }

  public function show($id) // Show a single resource
  {
      $contacts = Contact::find($id);

      return view('pages/display-search', compact('contacts'));
  }
}