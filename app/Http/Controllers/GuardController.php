<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Lumen\Application;

class GuardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['except'=>['login','logout']]);
    }

    /**
     * Shows login view to user
     *
     * @param Request $req
     * @param Application $app
     * @return View
     */
    public function login(Request $req, Application $app)
    {
        return view('login');
    }

    /**
     * Handles user info for login
     *
     * @param Request $req
     * @param Application $app
     * @return View
     */
    public function doLogin(Request $req, Application $app)
    {
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email'=>$req->get('email'), 'password'=>$req->get('password')], true))
        {
            //TODO: ARREGLAR EL LOGIN NO GUARDA
            $req->session()->put('user.id', Auth::id());
            $req->session()->put('user', User::with('groups')->find(Auth::id()));
            return redirect('/');
        }

    }

    /**
     * Destroy user session
     *
     * @param Request $req
     * @param Application $app
     * @return View
     */
    public function logout(Request $req, Application $app)
    {
        $req->session()->flush();

        return redirect('login');
    }

    /**
     * Recover user password from email
     *
     * @param Request $req
     * @return View
     */
    public function recovery(Request $req)
    {
        return $req->all();
    }
}
