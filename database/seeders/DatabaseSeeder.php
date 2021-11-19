<?php

namespace Database\Seeders;

use App\Models\Category;
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
        User::truncate();
        $user = User::factory()->create();

        Category::truncate();
        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'title' => 'My Personal Blog Post',
            'excerpt' => 'About my personal life',
            'category_id' => $personal->id,
            'user_id' => $user->id,
            'body' => 'This is a post all about my personal life blah blah blah',
        ]);

        Post::create([
            'title' => 'My Work Blog Post',
            'excerpt' => 'About my work life',
            'category_id' => $work->id,
            'user_id' => $user->id,
            'body' => 'This is a post all about my work life blah blah blah',
        ]);
    }
}
