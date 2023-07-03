<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'Personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.1</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor erat ut neque pulvinar ornare. Duis ut elementum sapien. Maecenas lobortis cursus est. Vivamus dignissim interdum enim in bibendum. Donec lacus leo, laoreet vitae leo nec</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.1</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor erat ut neque pulvinar ornare. Duis ut elementum sapien. Maecenas lobortis cursus est. Vivamus dignissim interdum enim in bibendum. Donec lacus leo, laoreet vitae leo nec</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.1</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor erat ut neque pulvinar ornare. Duis ut elementum sapien. Maecenas lobortis cursus est. Vivamus dignissim interdum enim in bibendum. Donec lacus leo, laoreet vitae leo nec</p>',
        ]);
    }
}
