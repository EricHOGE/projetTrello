<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    
}
