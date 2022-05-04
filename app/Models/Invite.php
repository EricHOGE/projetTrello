<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invite extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
