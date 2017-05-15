<?php

namespace App\Http\Controllers;

use App\Item;
use App\Balance;
use App\Group;
use App\User;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index']]);
    }

    public function index()
    {
        // GET -> /item
        return ['view'=>'index'];
    }

    public function create()
    {
        $user = User::find(1);
        $data = [
            'who' => $user->name,
            'user' => $user,
        ];
        return view('item/create', $data);
    }

    public function store()
    {
        // POST -> /item
    }

    public function show()
    {
        // GET -> /item/{id}
    }

    public function edit($id)
    {
        // GET -> /item/{id}/edit
        $balance = Balance::with(['group','item'])->find($id);
        return $balance;
    }

    public function update()
    {
        // PUT -> /item/{id}
    }

    public function delete()
    {
        // DELETE -> /item/{id}
    }
}
