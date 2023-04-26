<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return Category::create([
            'name' => $row['name'],
            'slug' => Str::slug($row['name']),
            'icon' => preg_replace('/class=".*?"/', 'class="w-8 h-8"', $row['icon']),
            'timeout' => $row['timeout'],
            'multiplier' => $row['points'],
            'multiplier_to_next_team' => $row['points'] / 2,
            'negative_marking_multiplier' => 0,
            'negative_marking_multiplier_to_next_team' => 0,
            'can_pass_to_next_team' => true,
            'auto_next_team' => false,
            'auto_next_question' => false,
            'has_media' => false,
            'has_multi_choice' => false,
            'multi_choice_count' => 0,
        ]);
    }
}
