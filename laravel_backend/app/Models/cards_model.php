<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cards_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','web_user_id','title','short_descr','tags','short_code','card_image','card_design','designed_by_user_id','sender_user_id','sender_name','seal_design_color','seal_design_image','background_id','envelop_design_id','envelop_inside_id','sound_file_id','effect_id','card_price','active',
    ];

	
	protected $table  = 'cards';

    public function list()
    {
        return $this->belongsTo(board_lists_model::class);
    }

}
