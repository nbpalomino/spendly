<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Group;
use App\User;

class ItemController extends Controller
{
    /**
     * @var \App\User
     */
    protected $user;

    public function __construct()
    {
        //$this->middleware('auth', ['except'=>['index']]);
        $this->user = User::with('groups')->findOrFail(1);
    }

    public function index(Request $req)
    {
        // GET -> /item
        return $this->user->groups->reduce(function($items, Group $group){
            return array_merge($items, $group->items->all());
        }, []);
    }

    public function create(Request $req)
    {
        $data = [
            'who' => $this->user->name,
            'user' => $this->user,
        ];
        return view('item/create', $data);
    }

    public function store(Request $req)
    {
        // POST -> /items
        $data     = [
            'status' => 'success',
            'message' => 'Se guardo correctamente...'
        ];
        $group    = $this->user->getGroup($req->input('group'));

        if( !$group ) {
            $data['status'] = 'error';
            $data['message']= 'No tiene permisos para guardar.';
            return $data;
        }

        try {
            $item = new Item($req->all());
            $group->items()->save($item);

        } catch (\Exception $e) {
            $data['status'] = 'error';
            $data['message']= 'Ocurrio un problema al guardar.';
            return $data;
        }

        return $data;
    }

    public function show(Request $req, $id)
    {
        // GET -> /item/{id}
        return Item::findOrFail($id)->with('group');
    }

    public function edit(Request $req, $id)
    {
        // GET -> /item/{id}/edit
        $groups_id = $this->user->getFromGroups('id');
        $item = Item::with('group')->whereIn('group_id', $groups_id)->findOrFail($id);
        $data = [
            'who' => $this->user->name,
            'user' => $this->user,
            'item' => $item,
        ];
        return view('item/edit', $data);
    }

    public function update(Request $req, $id)
    {
        // PUT -> /item/{id}
        $this->user     = User::with('groups')->findOrFail(1);
        $group     = $this->user->getGroup($req->input('group'));
        $groups_id = $this->user->getFromGroups('id');

        if( !$group ) {
            return redirect("/item/{$id}/edit?status=error");
        }

        try {
            $item = Item::with('group')->whereIn('group_id', $groups_id)->findOrFail($id);
            $item->update($req->all());
            $group->items()->save($item);

        } catch (Exception $e) {
            return redirect("/item/{$id}/edit?status=error");
        }

        return redirect('/?status=ok');
    }

    public function delete(Request $req, $id)
    {
        // DELETE -> /item/{id}
    }
}
