<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));
    }
    public function show(Contact $contact)
    {
        return view('backend.contact.show', compact('contact'));
    }
}
