<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function send(ContactFormRequest $request)
    {
        ////////////////////////////////////////
        ///  TO DO message handling ///////////
        /// ///////////////////////////////////
        return redirect()->back()->with('success', 'Uspešno ste poslali poruku preko kontakt forme.');
    }
}
