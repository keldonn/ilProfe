<?php

namespace ilProfe\Http\Controllers\Auth;

use ilProfe\User;
use ilProfe\GmapsController;
use ilProfe\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'latitud' => 'required|max:130',
            'phone' => 'max:40',
        ], [
          "email" => "Introduce un mail válido.",
          'required' => 'Debes completar este campo.',
          'confirmed' => 'Las contraseñas deben coincidir.',
          'max' => 'Demasiado largo.',
          'min' => 'Se necesitan al menos 6 caracteres.',
          'unique' => 'Ya existe un usuario con ese email.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ilProfe\User
     */
    protected function create(array $data)
    {
  //    if ($data['user_photo'] != '') {
  //      $file = $data['user_photo'];
    //    $name = time().'.'.$file->getClientOriginalExtension();
  //      $file->move(public_path('avatars'), $name);
    //    Storage::putFileAs('avatars', $file->getRealPath(), $name);

//        Storage::put(time(), $file, 'public');
  // Storage::put($path, File::get($file->getRealPath()));
  //    }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_profe' => $data['is_profe'],
            'bio' => 1,
            'latitud' => $data['latitud'],
            'longitud' => $data['longitud'],
            'phone' => '1',
        ]);
    }
}
// 'is_profe' => ($data['is_profe'] ? 0 : 1),
