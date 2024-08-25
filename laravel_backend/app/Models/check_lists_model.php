<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check_lists_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_id','check_list_title','active',
    ];

	
	protected $table  = 'card_check_lists';

    public function checkListItems()
    {
        return $this->hasMany(check_list_items_model::class, 'check_list_id');
    }

}
