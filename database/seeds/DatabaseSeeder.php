<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Eddie',
            'email' => 'ejdelmonico@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
