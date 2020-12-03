<?php

namespace App\Http\Controllers;

use App\Mail\ContactoFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('web.sections.static.contact');
    }

    public function store(Request $request){

        $request->validate([
            'name'
        ]);

        $correo = new ContactoFormMailable($request->all());
        Mail::to('germanf.08@hotmail.com')->send($correo);
        return view('web.sections.static.contact')->with('successMsg','Property is updated .');;
    }
}
