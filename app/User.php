<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\TextPasswordReset;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'access_token', 'access_token_secret', 'twitter_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function cart(){
		return $this->hasMany('App\Cart');
	}


/*	public function sendPasswordResetNotification($token)
	{
		$this->notify(new TextPasswordReset($token));
	}
 */
}
