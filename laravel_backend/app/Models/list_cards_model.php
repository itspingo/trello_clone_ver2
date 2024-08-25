<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_cards_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','list_id','title','description','seq','head_color','head_image','cover_style','background_color','background_image','is_template','visibility','member_ids','start_date','start_time','end_date','end_time','location','share_url','share_embed_code','share_qr_code','active',
    ];

	
	protected $table  = 'list_cards';

    // Define relationships

    public function cardLabels()
    {
        return $this->hasMany(labels_model::class, 'card_id');
    }

    public function cardInvitations()
    {
        return $this->hasMany(invitations_model::class, 'card_id');
    }

    public function cardCheckLists()
    {
        return $this->hasMany(check_lists_model::class, 'card_id')->with('checkListItems');
    }

    public function cardButtons()
    {
        return $this->hasMany(card_buttons_model::class, 'card_id')->with('buttonActions');
    }

    public function cardAttachments()
    {
        return $this->hasMany(attachment_model::class, 'card_id');
    }

    public function cardActivities()
    {
        return $this->hasMany(activities_model::class, 'card_id');
    }

    // Example of how to use the with method
    public static function fetchWithRelations()
    {
        return self::with([
            'cardLabels',
            'cardInvitations',
            'cardCheckLists',
            'cardButtons',
            'cardAttachments',
            'cardActivities'
        ])->get();
    }
}
