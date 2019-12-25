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
            'image' => 'nature.jpg'
        ]);

        Post_Category::create([
            'user_id' => 2,
            'name' => 'Adventure Places',
            'slug' => 'adventure-places',
            'image' => 'find-place3.jpg'
        ]);

        Post_Category::create([
            'user_id' => 1,
            'name' => 'Food Places',
            'slug' => 'food-places',
            'image' => 'find-place2.jpg'
        ]);

        Post_Category::create([
            'user_id' => 2,
            'name' => 'Local Places',
            'slug' => 'local-places',
            'image' => 'local-place4.jpg'
        ]);

        Post_Category::create([
            'user_id' => 2,
            'name' => 'Museum Cafe',
            'slug' => 'Museum-cafe',
            'image' => 'find-place5.jpg'
        ]);
    }
}
