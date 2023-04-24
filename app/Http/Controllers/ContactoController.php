<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class ContactoController extends Controller
{
    //
    public function contacto(Request $request)
    {
        //validar los campos del request
        $request->validate([
            'nombre' => 'required',
            'email' => ['required', 'email'],
            'mensaje' => 'required'
        ]);

        
        $contactoData = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ];
        //enviar correo de contacto a la variable de entorno MAIL_FROM_ADDRESS
        Mail::to('meditada@mailinator.com')->send(new ContactoMail($contactoData));
        return redirect()->route('contacto')->with('mensaje', 'Mensaje enviado correctamente');
    }
}