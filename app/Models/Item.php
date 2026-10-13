<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'status',
    ];

    /**
     * 備品は1つのカテゴリに属する（N : 1）
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 1つの備品は複数の貸出履歴を持つ（1 : N）
     */
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}