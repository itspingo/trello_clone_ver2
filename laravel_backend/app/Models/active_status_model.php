<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class active_status_model extends Model
{
    use HasFactory;
	
	
    protected $table = 'active_status';

    // Specify the primary key
    protected $primaryKey = 'id';

    // Disable auto-incrementing as `id` is NOT NULL but doesn't auto-increment
    public $incrementing = true;

    // Specify that the primary key is not a numeric value
    protected $keyType = 'int';

    // Disable timestamps if your table doesn't have `created_at` and `updated_at` columns
    public $timestamps = true;

    // Define fillable properties to allow mass assignment
    protected $fillable = ['id', 'is_active', 'active', 'recdate'];

	
}
