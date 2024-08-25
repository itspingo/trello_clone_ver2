<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StarredObjectsModel extends Model
{
    use SoftDeletes;

    protected $table = 'starred_objects';

    protected $fillable = [
        'client_id',
        'user_id',
        'object_type',
        'object_id',
        'active',
    ];
}
