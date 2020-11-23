<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(3)->create()->each(function($user){
            Post::factory()->times(2)->make()->each(function($post) use ($user) {
                $user->posts()->save($post);
            });

        });
    }
}
