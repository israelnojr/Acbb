<?php

use App\Post_Category;
use Illuminate\Database\Seeder;

class Post_CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post_Category::query()->delete();
        Post_Category::create([
            'user_id' => 1,
            'name' => 'Nature Places',
            'slug' => 'nature-places',
            'image' => 'nature.jpg',
            'view_count' => 1
        ]);

        Post_Category::create([
            'user_id' => 2,
            'name' => 'Adventure Places',
            'slug' => 'adventure-places',
            'image' => 'find-place3.jpg',
            'view_count' => 1
        ]);

        Post_Category::create([
            'user_id' => 1,
            'name' => 'Food Places',
            'slug' => 'food-places',
            'image' => 'find-place3.jpg',
            'view_count' => 1
        ]);

        Post_Category::create([
            'user_id' => 2,
            'name' => 'Local Places',
            'slug' => 'local-places',
            'image' => 'nature.jpg',
            'view_count' => 1
        ]);

        Post_Category::create([
            'user_id' => 2,
            'name' => 'Museum Cafe',
            'slug' => 'Museum-cafe',
            'image' => 'nature.jpg',
            'view_count' => 1
        ]);

        Post_Category::create([
            'user_id' => 4,
            'name' => 'Mapples Cafe',
            'slug' => 'mapples-cafe',
            'image' => 'nature.jpg',
            'view_count' => 1
        ]);
    }
}
