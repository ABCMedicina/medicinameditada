<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistroMail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
        $request->validate([
            //'name' => ['required', 'string', 'max:255'],
            'nombres' => ["required", "string", "max:255", "regex:/^[a-zA-ZáéíóúñÑ\s'.-]+$/"],
            'apellidos' => ["required", "string", "max:255", "regex:/^[a-zA-ZáéíóúñÑ\s'.-]+$/"],
            'documento' => ['required', 'string', 'max:30', 'regex:/^[A-Z0-9]+$/', 'unique:'.User::class],
            'fecha_nacimiento' => ['required', 'date'],
            'telefono' => ['required', 'numeric', 'digits:10'],
            //'direccion' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*\d).+$/', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $user = User::create([
            'name' => $request->nombres.' '.$request->apellidos,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'documento' => $request->documento,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => "",
            'rol_id' => 3,
            'estado' => true,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Auth::login($user);

         //Se envía el email de registro 
         $registroData=[
            "nombre"=>Auth()->user()->name,
          
        ];
        Mail::to(Auth()->user()->email)->send(new RegistroMail($registroData));
        event(new Registered($user));

        
        // cerrar la sesion y redirigir al login
        Auth::logout();
        return redirect()->route('login')->with('info', 'Se ha registrado con éxito, por favor inicie sesión');

       // return redirect(RouteServiceProvider::HOME);
    }
}
