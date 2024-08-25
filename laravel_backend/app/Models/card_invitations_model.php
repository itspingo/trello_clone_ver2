<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_invitations_model extends Model
{
    use SoftDeletes;

    protected $table = 'card_invitations';

    protected $fillable = [
        'client_id',
        'user_id',
        'card_id',
        'full_name',
        'email_address',
        'active',
    ];
}

