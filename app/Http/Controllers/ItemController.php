<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
	public function index() {
		$items = Item::get();
		return view('item.index', compact('items'));
	}

	public function detail($id) {
		$item = Item::where('id', $id)->first();
		return view('item.detail', compact('item'));
	}
}
