<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeScale;

class GradeScaleSeeder extends Seeder
{
    public function run(): void
    {
        GradeScale::insert([
            [
                'nilai' => 'A',
                'bobot' => 4.00,
                'nilai_min' => 85,
                'nilai_max' => 100,
            ],
            [
                'nilai' => 'B',
                'bobot' => 3.00,
                'nilai_min' => 75,
                'nilai_max' => 84,
            ],
            [
                'nilai' => 'C',
                'bobot' => 2.00,
                'nilai_min' => 65,
                'nilai_max' => 74,
            ],
            [
                'nilai' => 'E',
                'bobot' => 0.00,
                'nilai_min' => 0,
                'nilai_max' => 64,
            ],
        ]);
    }
}