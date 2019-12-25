<?php

use App\Social_media;
use Illuminate\Database\Seeder;

class Social_mediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social_media::query()->delete();
        Social_media::create([
            'name' => 'Facebook',
            'icon' => '<i class="fab fa-facebook-f"></i>'
        ]);

        Social_media::create([
            'name' => 'LinkedIn',
            'icon' => '<i class="fab fa-linkedin-in"></i>'
        ]);

        Social_media::create([
            'name' => 'Twitter',
            'icon' => '<i class="fab fa-twitter"></i>'
        ]);
    }
}
