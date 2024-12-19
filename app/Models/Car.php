<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

        protected $fillable = [
        'number',
        'mark',
        'model',
        'user_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
