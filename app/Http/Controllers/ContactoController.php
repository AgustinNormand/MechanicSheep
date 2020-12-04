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
            'nombre' => 'required|max:20',
            'apellido' => 'required|max:20',
            'email' => 'required|email:rfc,dns',
            'mensaje' => 'required|max:350'
        ]);

        $correo = new ContactoFormMailable($request->all());
        Mail::to(env('MAIL_REPLY_ADDRESS'))->send($correo);
        return view('web.sections.static.contact')->with('successMsg','Mensaje enviado con éxito');
    }
}
