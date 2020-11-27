<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $tiposDeDoc = DB::table('tipo_docs')->get();
        return view('auth.register',compact('tiposDeDoc'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipo_dni' => ['required', 'integer','min:1','max:5'],
            'dni' => ['required', 'integer',],
            'nombre' => ['required', 'string', 'max:200'],
            'apellido' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    private function tryToGetIdPersona(array $data){
        $idPersona = null;

        $personas = Persona::getByDni($data["dni"]);

        if(count($personas) == 1)
            $idPersona = $personas[0]->ID_PERSONA;
        else
        {
            $personas = Persona::getByExactNameAndSurname($data["nombre"], $data["apellido"]);
            if(count($personas) == 1)
                $idPersona = $personas[0]->ID_PERSONA;
        }

        return $idPersona;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $idPersona = $this->tryToGetIdPersona($data);

        if(is_null($idPersona))
            $idPersona = Persona::create([
                "NOMBRE" => $data['nombre'],
                "APELLIDO" => $data['apellido'],
                "NRO_DOC" => $data["dni"],
                "ID_TIPO_DOC" => $data["tipo_dni"],
                //"CREATED_FROM_WEB => true,
            ])->ID_PERSONA;

        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'estado' => true,
            'ID_TIPO_DOC' => $data["tipo_dni"],
            'ID_PERSONA' => $idPersona,
        ]);
    }
}
