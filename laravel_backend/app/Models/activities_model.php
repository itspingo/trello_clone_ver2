<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_id','comment','active',
    ];

	
	protected $table  = 'card_activities';
}
