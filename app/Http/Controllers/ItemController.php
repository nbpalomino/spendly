<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Balance;
use App\Group;
use App\User;

class ItemController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['except'=>['index']]);
    }

    public function index()
    {
        // GET -> /item
        return Item::all();
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

    public function store(Request $req)
    {
        // POST -> /item

        try {
            $user = User::with('groups')->findOrFail(1);

            $item = Item::create($req->all());

            $balance = new Balance();
            $balance->item_id = $item->id;
            $balance->group_id = $user->groups[0]->id;
            $balance->type = Balance::NEGATIVE;
            $balance->save();

        } catch (Exception $e) {
            return ['status'=>'ERROR', 'message'=>$e->getMessage()];
        }

        return ['status'=>'OK', 'message'=>'Registro creado: '+$item->id];
    }

    public function show(Request $req, $id)
    {
        // GET -> /item/{id}
        return Item::findOrFail($id)->with('balance');
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
