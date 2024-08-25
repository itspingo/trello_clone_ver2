<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class button_actions_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_button_id','base_rul','action','active',
    ];

	
	protected $table  = 'card_button_actions';
}
