<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call([
            ItemsTableSeeder::class,
            UsersTableSeeder::class,
            GradeSeeder::class,
        ]);
        $this->call(CommentsTableSeeder::class);
    }
}