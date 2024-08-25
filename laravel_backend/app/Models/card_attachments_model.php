<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_attachments_model extends Model
{
    use SoftDeletes;

    protected $table = 'card_attachments';

    protected $fillable = [
        'client_id',
        'user_id',
        'card_id',
        'file_name',
        'file_attached',
        'comment',
        'active',
    ];
}
