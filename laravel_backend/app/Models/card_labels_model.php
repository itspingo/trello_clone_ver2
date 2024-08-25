<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_labels_model extends Model
{
    use SoftDeletes;

    protected $table = 'card_labels';

    protected $fillable = [
        'client_id',
        'user_id',
        'card_id',
        'label_color',
        'label_text',
        'active',
    ];
}

