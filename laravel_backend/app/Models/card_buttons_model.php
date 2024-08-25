<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_buttons_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','card_id','button_icon','button_label','active',
    ];

	
	protected $table  = 'card_buttons';

    public function buttonActions()
    {
        return $this->hasMany(button_actions_model::class, 'card_button_id');
    }
}
