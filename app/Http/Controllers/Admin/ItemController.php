<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\ItemAddRequest;
use App\Http\Requests\ItemEditRequest;

class ItemController extends Controller
{
	public function detail($id) {
		$item = Item::where('id', $id)->first();
		return view('admin.detail', compact('item'));
	}

	public function showAddForm() {
		return view('admin.add');
	}

	public function add(ItemAddRequest $request) {
		$item = new Item;
		$item->name = $request->name;
		$item->info = $request->info;
		$item->price = $request->price;
		$item->stocks = $request->stocks;
		if (isset($request->img)) {
			if ($request->file('img')->isValid()) {
				$upload_name = sha1(uniqid(mt_rand(), true)) . '.jpg';
				$upload_dir = 'items/';
				$filename = $request->file('img')->storeAs($upload_dir, $upload_name, 'public');
				$item->items_img = basename($filename);
			}
		} else {
			$item->items_img = null;
		}
		$item->save();
		return redirect()->route('admin.home');
	}

	public function showEditForm(Request $request) {
		$form = Item::find($request->id);
		return view('admin.edit', compact('form'));
	}

	public function edit(ItemEditRequest $request) {
		$item = Item::find($request->id);
		$item->name = $request->name;
		$item->info = $request->info;
		$item->price = $request->price;
		$item->stocks = $request->stocks;

		if ($request->delete !== null) {
			$file = 'items/' . $item->items_img;
			Storage::disk('public')->delete($file);
			$item->items_img = null;
		}

		if (isset($request->img)) {
			if ($request->file('img')->isValid()) {
				$upload_name = sha1(uniqid(mt_rand(), true)) . '.jpg';
				$upload_dir = 'items/';
				$filename = $request->file('img')->storeAs($upload_dir, $upload_name, 'public');
				$item->items_img = basename($filename);
			}
		}

		$item->save();
		return redirect()->route('admin.home');
	}

}







