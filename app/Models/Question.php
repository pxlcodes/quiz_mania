<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'points',
        'category_id',
        'order',
        'answered',
    ];

    protected $appends = [
        'url',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn($value) => route('questions.show', $this->id),
        );
    }
}
