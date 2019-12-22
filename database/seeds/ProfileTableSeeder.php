<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::query()->delete();

        $supserAdmin = Profile::create([
            'user_id' => 1,
            'phone' => '09051323710',
            'bio' => 'I am the super admin',
        ]);
        
        $Admin = Profile::create([
            'user_id' => 2,
            'phone' => '09051323710',
            'bio' => 'i am the admin',
        ]);
        
        $cordinator = Profile::create([
            'user_id' => 3,
            'phone' => '09051323710',
            'bio' => 'i am the cordinator',
        ]);

        $user = Profile::create([
            'user_id' => 4,
            'phone' => '09051323710',
            'bio' => 'i am just a fucking user',
        ]);
    }
}
