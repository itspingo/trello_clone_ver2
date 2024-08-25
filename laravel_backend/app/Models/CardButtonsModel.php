<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_buttons_model extends Model
{
    use SoftDeletes;

    protected $table = 'card_buttons';

    protected $fillable = [
        'client_id',
        'user_id',
        'button_icon',
        'button_label',
        'active',
    ];
}
