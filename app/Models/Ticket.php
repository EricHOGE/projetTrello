<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Liste;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function liste(): BelongsTo
    {
        return $this->belongsTo(Liste::class)->where($id);
    }
}
