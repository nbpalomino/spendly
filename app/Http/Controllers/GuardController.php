<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Laravel\Lumen\Application;

class GuardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['login','logout']]);
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
        return $req->all();
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
        return $req->all();
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