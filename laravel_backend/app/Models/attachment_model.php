<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attachment_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_id','file_name','file_attached','comment','active',
    ];

	
	protected $table  = 'card_attachments';
}
