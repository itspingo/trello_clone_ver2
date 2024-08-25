<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_lists_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','board_id','title','head_color','seq','head_image','background_color','background_image','is_template','visibility','member_ids','active',
    ];

	
	protected $table  = 'board_lists';

    public function board()
    {
        return $this->belongsTo(boards_model::class);
    }

    public function cards()
    {
        return $this->hasMany(list_cards_model::class,'list_id','id')
                            ->with([
                                'cardLabels',
                                'cardInvitations',
                                'cardCheckLists',                                
                                'cardButtons',
                                'cardAttachments',
                                'cardActivities'
                            ])->orderBy('seq');
    }
}
