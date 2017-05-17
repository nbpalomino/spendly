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
        $user = User::with('groups')->findOrFail(1);
        $data = [
            'who' => $user->name,
            'user' => $user,
        ];
        return view('item/create', $data);
    }

    public function store(Request $req)
    {
        // POST -> /item
        $user = User::with('groups')->findOrFail(1);

        if(! $user->isValidGroup($req->input('group')) ) {
            return redirect('/item/create');
        }

        try {
            $item     = Item::create($req->all());
            $group    = $user->getGroup($req->input('group'));

            $balance = $group->balances()->create([
                'item_id'  => $item->id,
                'group_id' => $group->id,
                'type'     => (bool)$req->input('type') ? Balance::POSITIVE : Balance::NEGATIVE,
            ]);

        } catch (Exception $e) {
            return ['status'=>'ERROR', 'message'=>$e->getMessage()];
        }

        return redirect('/');
    }

    public function show(Request $req, $id)
    {
        // GET -> /item/{id}
        return Item::findOrFail($id)->with('balance');
    }

    public function edit($id)
    {
        // GET -> /item/{id}/edit
        // $balance = Item::with(['balance'])->find($id);
        $balance = Balance::with(['group','item'])->findByItem($id)->get();
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
