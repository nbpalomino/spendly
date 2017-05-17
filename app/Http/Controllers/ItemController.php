<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Group;
use App\User;

class ItemController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['except'=>['index']]);
        $this->user = User::with('groups')->findOrFail(1);
    }

    public function index()
    {
        // GET -> /item
        return $this->user->groups->reduce(function($items, Group $group){
            return array_merge($items, $group->items->all());
        }, []);
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

            $balance = $group->items()->create([
                $req->all()
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
        $balance = Item::with(['group'])->whereIn('group_id', $this->user->getFromGroups('id'))->findOrFail($id);
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
