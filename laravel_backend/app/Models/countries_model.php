<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class countries_model extends Model
{
    use SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'client_id',
        'user_id',
        'country_code',
        'country_name',
        'currency_code',
        'currency_name',
        'currency_symbol',
        'lang_code',
        'language',
        'lang_direction',
        'active',
    ];
}
