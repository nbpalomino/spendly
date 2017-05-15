<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Application;
use Illuminate\Support\Facades\DB;
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
        $user = User::with('groups')->find(1);
        $groups = $user->groups;
        return $user;
    }
}
