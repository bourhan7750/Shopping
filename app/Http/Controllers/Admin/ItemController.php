<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        //SELECT * FROM items;
        $items = Item::get();
        $data = ['items' => $items];
        return view('admin.item.index', $data);
    }

    public function create()
    {
        return view('admin.item.create');
    }

    public function add(ItemRequest $request)
    {
        //INSERT INTO items VALUES(...);
        Item::create($request->all());
        return redirect()->route('admin.item.index');
    }

    public function edit(Request $request)
    {
        //SELECT * FROM items WHERE id = xx;
        $item = Item::find($request->id);
        $data = ['item' => $item];
        return view('admin.item.edit', $data);
    }

    public function update(ItemRequest $request)
    {
        $posts = $request->all();
        //UPDATE items SET xxxx=xxxx, ... WHERE id = xx;
        Item::find($request->id)->update($posts);
        return redirect()->route('admin.item.edit', ['id' => $request->id]);
    }
}