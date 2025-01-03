<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepairRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'problem',
        'date',
        'car_id',
        'user_id',
        'repair_date',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
