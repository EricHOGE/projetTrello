<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Liste extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, "liste_id", "id");
    }
}
