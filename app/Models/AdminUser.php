<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    public function substation()
    {
        return $this->hasOne(Substation::class, 'owner_id', 'id');
    }
}
