<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rank',
    ];

    protected $appends = [
        'logo_url',
    ];

    public function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => "https://eu.ui-avatars.com/api/?name={$this->name}&size=250",
        );

    }
}
