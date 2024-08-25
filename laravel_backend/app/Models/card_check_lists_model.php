<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_check_lists_model extends Model
{
    use SoftDeletes;

    protected $table = 'card_check_lists';

    protected $fillable = [
        'client_id',
        'user_id',
        'card_id',
        'check_list_title',
        'active',
    ];
}

