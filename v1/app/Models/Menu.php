<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

     protected $fillable = [
        'menu_category',
        'menu_name',
        'is_heading',
        'menu_url',
        'menu_sorting',       
        'menu_column_grid',       
        'is_active',       
        'open_new_tab',       
    ];
}
