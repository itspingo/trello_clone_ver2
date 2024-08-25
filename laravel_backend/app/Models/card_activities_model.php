<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_activities_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
       'id', 'client_id', 'user_id', 'website_user', 'card_id', 'comment', 'active', 'created_at', 'updated_at', 'deleted_at'
    ];

	protected $table  = 'card_activities';
}
