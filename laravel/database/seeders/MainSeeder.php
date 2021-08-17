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
=======
            UsersTableSeeder::class,
            GradeSeeder::class,

            PostsTableSeeder::class,
>>>>>>> fa9ebfc63cd823bcc9c7a481f176032d8e1e3d40
        ]);
        $this->call(CommentsTableSeeder::class);
    }
}
