<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfileModel extends Model
{
    use SoftDeletes;

    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'client_id',
        'user_type',
        'contact_no',
        'country_id',
        'state_province',
        'city',
        'street_address',
        'preffered_lang',
        'preffered_currency',
        'active',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}

