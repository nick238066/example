<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Substation extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'hash_key',
        'hash_iv',
    ];

    public function owner()
    {
        return $this->belongsTo(AdminUser::class, 'owner_id', 'id');
    }
}
