<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'rental_date',
        'return_due_date',
        'returned_date',
        'status',
    ];

    /**
     * 貸出履歴は1人のユーザーに属する（N : 1）
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 貸出履歴は1つの備品に属する（N : 1）
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}