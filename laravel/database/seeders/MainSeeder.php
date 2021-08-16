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
<<<<<<< HEAD
            UsersTableSeeder::class,
            GradeSeeder::class,

=======
            PostsTableSeeder::class,
>>>>>>> 2e96afd4d7e7653cee884e136220fe11b12f33bb
        ]);
        $this->call(CommentsTableSeeder::class);
    }
}
