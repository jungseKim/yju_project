<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            'grade' => 'bronze',
            'low' => 1,
            'high' => 10,
        ]);
        DB::table('grades')->insert([
            'grade' => 'silver',
            'low' => 11,
            'high' => 20,
        ]);
        DB::table('grades')->insert([
            'grade' => 'gold',
            'low' => 21,
            'high' => 30,
        ]);
        DB::table('grades')->insert([
            'grade' => 'platinum',
            'low' => 31,
            'high' => 40,
        ]);
    }
}
