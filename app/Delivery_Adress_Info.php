<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery_Adress_Info extends Model
{
	use SoftDeletes;

	protected $table = 'delivery_adress_info';
	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'user_id', 'zipcode', 'prefecture', 'city', 'detail_adress', 'tel'];
}
