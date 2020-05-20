<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	//public function index()
	//{
	//	return view('admin.home');
	//}
	public function index()
	{
		$items = Item::get();
		return view('admin.index', compact('items'));
	}
}
