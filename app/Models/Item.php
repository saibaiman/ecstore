<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
	protected $table = 'items';
	protected $guarded = array('id');
	public $timestamps = true;

	public static $rules = array(
		'name' => 'required',
		'info' => 'max:255',
		'price' => 'required'
	);

}
