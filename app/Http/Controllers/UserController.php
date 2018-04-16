<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Lumen\Application;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Index method
     */
    public function index(Request $request)
    {
        $user = User::find(5);
        //$groups = $user->groups;
        //$request->session()->save();

        return $user;
    }

    public function create(Request $request)
    {
        //Auth::attempt(['email'=>'miriam.alvarezromero@gmail.com', 'password'=>'1234567u']);
        $data['title'] = "Crear nuevo usuario ";

        return view('register', $data);
    }

    public function store(Request $req)
    {
        // POST -> /users
        $data     = [
            'status' => 'success',
            'message' => 'Se guardo correctamente...'
        ];

        try {
            $user = new User($req->all());
            $user->password = app('hash')->make($req->get('password'));
            $user->key      = str_random(8);
            $user->remember_token = str_random(12);
            $user->save();

            Group::createFor($user);

            if(Auth::attempt(['email'=>$user->email, 'password'=>$req->get('password')], true))
            {
                //TODO: ARREGLAR EL LOGIN NO GUARDA
                $req->session()->put('user', User::with('groups')->find(Auth::id()));
                return redirect('/')->with($data);
            }

        } catch (\Exception $e) {
            $data['status']     = 'error';
            $data['message']    = 'Ocurrio un problema al guardar.';

            $data['title']      = "Crear nuevo usuario";
            return view('register', $data);
        }

        return $data;
    }

}
