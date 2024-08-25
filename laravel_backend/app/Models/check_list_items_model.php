<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check_list_items_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','check_list_id','item_title','is_completed','active',
    ];

	
	protected $table  = 'check_list_items';
}
