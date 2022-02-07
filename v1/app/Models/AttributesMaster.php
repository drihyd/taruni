<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesMaster extends Model
{
	use HasFactory;
	protected $table = 'attributes_masters';		
	protected $guarded=[];	
}
