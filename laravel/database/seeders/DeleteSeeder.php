<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DeleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Comment::truncate();
        Item::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        
    }
}