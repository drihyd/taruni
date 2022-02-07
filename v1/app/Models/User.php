<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable 
{
    use HasFactory,Notifiable;
	
	protected $hidden = [
        'password',
        'two_factor_recovery_codes',
        'two_factor_secret',
		'remember_token',
    ];
	
	
	protected $fillable = [
  'email',
  'password',
  'phone',
  'country',
  'state',
  'city',
  'address',
  'firstname',
  'lastname',
  'age',
  'pincode',
  'gender',
  'profile',
  'user_type',
  'donot_send_newsletter',
  'date',
  'is_guest',
  'guest_email',
  'sent_email',
  'social_media',
  'identifier',
  'ip',
  'remember_token',
  'created_at',
  'email_verified_at',
  'is_email_verified',
  'updated_at'
  
	];




    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function wishlist(){
       return $this->hasMany(Wishlist::class);
    }
	public function accounts(){
    return $this->hasMany('App\Models\LinkedSocialAccount');
}
}
