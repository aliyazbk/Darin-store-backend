<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
protected $fillable = [
    'product_id',
    'image_path',
    'alt_text',
    'color',
    'is_primary',
    'display_order',
];

    protected $appends = [
        'image_url',
    ];

    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    public function getImageUrlAttribute(): string
    {
        return url('media/' . ltrim($this->image_path, '/'));
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}