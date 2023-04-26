<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class QuestionImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        try {

            $category = Category::where('name', $row['category'])->first();
        } catch (Throwable $th) {
            dd($row);
        }

        if (!$category) {
            return;
        }

        $question = $category->questions()->create([
            'question' => $row['question'],
//            'points' => $row['points'],
            'order' => $row['qn'],
        ]);

        $question->options()->create([
            'answer' => $row['answer'],
            'is_correct' => true,
            'order' => 1,
        ]);

    }
}
