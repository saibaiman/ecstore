<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Models\Item;

class CartsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function store(Request $request){
		$item = Item::find($request->get('item_id'));
		$user_id = Auth::id();
		$cart_recog = Cart::where('item_id', $request->get('item_id'))->where('user_id', $user_id)->first();

		if ($item['stocks'] < $request->get('item_num')) {
			return redirect()->route('item.detail', [$item['id']])->with('message', '在庫数以上はカートに入れることが出来ません');
		}

		$sum = $item->price * $request->get('item_num');
		if (empty($cart_recog)) {
			$cart = new Cart([
				'item_id' => $item->id,
				'qty' => $request->get('item_num'),
				'price' => $sum
			]);
			Auth::user()->cart()->save($cart);
		} else {
			$cart_recog->qty = $cart_recog['qty'] + $request->get('item_num');
			$cart_recog->price = $cart_recog['price'] + $sum;
			$cart_recog->save();
		}
		return redirect()->route('cart.index');
	}

	public function index(){
		$user_id = Auth::user()->id;
		$data = Cart::all()->where('user_id', '=', $user_id);
		$total_sum = 0;
		foreach ($data as $price_data) {
			$total_sum += $price_data['price'];
		}
		return view('cart.index', compact('data', 'total_sum'));
	}

	public function remove($id){
		Auth::user()->cart()->where('id', $id)->firstOrFail()->delete();
		return redirect()->route('cart.index');
	}

}
