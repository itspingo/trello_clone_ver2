<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workspaces_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','title','short_name','website','description','logo','visibility','membership_rule','board_creation_rule','board_deletion_rule','board_sharing_rule','member_ids','active',
    ];

	
	protected $table  = 'workspaces';
}
