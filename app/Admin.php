<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\MustVerifyEmail;

class Admin extends Authenticatable
{
	use Notifiable;
	protected $guard = 'admin';

	protected $fillable = [
		'name', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remenber_token',
	];

}
