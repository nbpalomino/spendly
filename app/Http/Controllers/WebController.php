<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Application;
use Illuminate\Support\Facades\DB;
use App\User;

class WebController extends Controller
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
        $user = $this->user = $req->session()->get('user');
        /*return $user->firstGroup()->balances->map(function($item){
            return $item->item->mount;
        });
        */
        $data = [
            'who' => $user->name,
            'user' => $user,
        ];
        return view('base.main', $data);
    }
}
