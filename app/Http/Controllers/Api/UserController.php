<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Laravel\Lumen\Application;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;

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
     *
     * @return Response
     */
    public function index(Request $req, Application $app)
    {
        return User::with('groups')->find(1);
    }
}
