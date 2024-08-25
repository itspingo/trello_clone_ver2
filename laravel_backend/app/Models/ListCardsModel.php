<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListCardsModel extends Model
{
    use SoftDeletes;

    protected $table = 'list_cards';

    protected $fillable = [
        'client_id',
        'user_id',
        'list_id',
        'title',
        'description',
        'head_color',
        'head_image',
        'background_color',
        'background_image',
        'is_template',
        'visibility',
        'member_ids',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'location',
        'share_url',
        'share_embed_code',
        'share_qr_code',
        'active',
    ];
}
