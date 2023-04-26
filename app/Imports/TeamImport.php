<?php

namespace App\Imports;

use App\Models\Team;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeamImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return Team::create([
            'name' => $row['sn'],
            'description' => $row['name'],
            'rank' => 0,
        ]);

    }
}

