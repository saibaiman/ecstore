<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterAdress;
use App\Http\Requests\EditAdress;
use Illuminate\Support\Facades\Auth;
use App\Delivery_Adress_Info;
use App\Http\Controllers\config\pref;

class Delivery_Adress_InfoController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index() {
		$user_id = Auth::id();
		$Adress_Info = Delivery_Adress_Info::where('user_id', $user_id)->get();
		return view('adress.index', compact('Adress_Info'));
	}

	public function registerForm() {
		$prefs = config('pref');
		return view('adress.register', compact('prefs'));
	}

	public function register(RegisterAdress $request) {
		$user = Auth::user();
		$delivery_info = new Delivery_Adress_Info([
			'name' => $user['name'],
			'user_id' => $user['id'],
			'zipcode' => $request->get('zipcode'),
			'prefecture' => $request->get('prefecture'),
			'city' => $request->get('city'),
			'detail_adress' => $request->get('detail_adress'),
			'tel' => $request->get('tel')
		]);
		$delivery_info->save();
		return redirect()->route('adress.index');
	}

	public function editForm($id) {
		$user_id = Auth::id();
		$prefs = config('pref');
		$Adress_Info = Delivery_Adress_Info::where('user_id', $user_id)->where('id', $id)->get();
		return view('adress.edit', compact('Adress_Info', 'prefs'));
	}

	public  function edit(EditAdress $request, $id) {
		$user_id = Auth::id();
		$data = Delivery_Adress_Info::where('user_id', $user_id)->where('id', $id)->first();
		$data->zipcode = $request->get('zipcode');
		$data->prefecture = $request->get('prefecture');
		$data->city = $request->get('city');
		$data->detail_adress = $request->get('detail_adress');
		$data->tel = $request->get('tel');
		$data->save();
		return redirect()->route('adress.index');
	}


	public function deleteForm($id) {
		$user_id = Auth::id();
		$Adress_Info = Delivery_Adress_Info::where('user_id', $user_id)->where('id', $id)->get();
		return view('adress.delete', compact('Adress_Info'));
	}

	public function delete(Request $request, $id) {
		$user_id = Auth::id();
		Delivery_Adress_Info::where('user_id', $user_id)->where('id', $id)->firstOrFail()->delete();
		return redirect()->route('adress.index');
	}
}
