<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Model
{
    use HasFactory;
	
	protected $table = 'users';
	
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
	'gender',
	'user_type',
	'donot_send_newsletter',
	'date',
	'is_guest',
	'guest_email',
	'sent_email',
	'social_media',
	'identifier',
	'ip',
	'pincode'
];

  protected $hidden = [
        'password',
         ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];
}
