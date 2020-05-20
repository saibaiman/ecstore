<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Delivery_Adress_Info;
use App\Admin;
use App\User;

class Member_IndexController extends Controller
{
	public function index() {
		$users = User::get();
		return view('admin.member_index', compact('users'));
	}

	public function detail($id) {
		$user = User::where('id', $id)->first();
		$adress = Delivery_adress_info::where('user_id', $id)->get();
		return view('admin.member_detail', compact('user', 'adress'));
	}
}


