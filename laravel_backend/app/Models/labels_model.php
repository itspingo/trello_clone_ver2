<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labels_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_id','label_color','label_text','active',
    ];

	
	protected $table  = 'card_labels';
}
