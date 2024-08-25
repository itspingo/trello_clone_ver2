<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boards_model extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id','workspace_id','title','background_color','background_image','visibility','is_template','logo','member_ids','active',
    ];

	public function lists()
    {
        return $this->hasMany(board_lists_model::class,'board_id','id')->orderBy('seq');
    }

	protected $table  = 'boards';
}
