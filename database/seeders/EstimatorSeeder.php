<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Estimator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstimatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys = 0;');
        Estimator::truncate();
        Option::truncate();
        DB::statement('PRAGMA foreign_keys = 1;');
        $data = array_map('str_getcsv', file(database_path('seeds/estimators.csv')));
        $header = array_shift($data);
        $data = array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $data);
        // dd($data);
        foreach ($data as $row) {
            $estimator = Estimator::updateOrCreate([
                'question' => $row['question'],
            ], [
                'question' => $row['question'],
                'answer_type' => $row['answer_type'],
                'is_special_case' => $row['is_special_case'],
            ]);
            Option::create([
                'estimator_id' => $estimator->id,
                'option' => $row['pilihan'],
                'value' => $row['harga'],
                'next_question_id' => $row['next_question_id'] ?? null,
            ]);
        }
    }
}
