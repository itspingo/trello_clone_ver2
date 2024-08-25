<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_button_actions_model extends Model
{
    use SoftDeletes;

    protected $table = 'card_button_actions';

    protected $fillable = [
        'client_id',
        'user_id',
        'card_button_id',
        'base_rul',
        'action',
        'active',
    ];
}
