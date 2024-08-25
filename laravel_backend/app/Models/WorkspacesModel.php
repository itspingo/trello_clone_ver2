<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkspacesModel extends Model
{
    use SoftDeletes;

    protected $table = 'workspaces';

    protected $fillable = [
        'client_id',
        'user_id',
        'title',
        'short_name',
        'website',
        'description',
        'logo',
        'visibility',
        'membership_rule',
        'board_creation_rule',
        'board_deletion_rule',
        'board_sharing_rule',
        'member_ids',
        'active',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}

