<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitations_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_id','full_name','email_address','active',
    ];

	
	protected $table  = 'card_invitations';
}
