<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'timeout',
        'multiplier',
        'multiplier_to_next_team',
        'negative_marking_multiplier',
        'negative_marking_multiplier_to_next_team',
        'can_pass_to_next_team',
        'auto_next_team',
        'auto_next_question',
        'has_media',
        'has_multi_choice',
        'multi_choice_count',
    ];

    protected $appends = [
        'link'
    ];

    public function getLinkAttribute(): string
    {
        return route('categories.show', $this->slug);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
