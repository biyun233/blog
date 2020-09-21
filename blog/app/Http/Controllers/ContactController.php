<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function create(){
        return view('layouts/contact');
    }

    public function store(ContactRequest $request)
    {
        //$validated = $request->validated();
        $contact = new Contact();
        $contact->contact_name = $request->nom;
        $contact->contact_email = $request->email;
        $contact->contact_message = $request->message;

        $contact->save();
        return view('layouts/confirm');
    }

}
