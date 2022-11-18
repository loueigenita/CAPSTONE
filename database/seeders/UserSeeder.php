<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'user_type' => 'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123')
        ]);
    }
}
