<?php

//require_once("twitteroauth/twitteroauth.php");

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Facades\Twitter;


class TwitterController extends Controller
{
	public function searchForm()
	{
		return view('twitter.form');
	}

	public function index(Request $request)
	{

		$results = \Twitter::get('search/tweets', array("q" => $request['search'], "count" => 5));
		$result = $results->statuses;
		return view('twitter.twitter', ["result" => $result]);
	}

}
