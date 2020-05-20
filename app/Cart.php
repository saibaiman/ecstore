<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
	use SoftDeletes;

	protected $fillable = ['item_id', 'qty', 'price'];
	protected $dates = ['deleted_at'];

	public function item(){
		return $this->belongsTo('App\Models\Item');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}
