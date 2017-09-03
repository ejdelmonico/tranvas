<?php

use App\Modules\Event\Event;
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
        factory(\App\User::class)->create([
            'name' => 'Eddie',
            'email' => 'ejdelmonico@gmail.com',
            'password' => bcrypt('password'),
            'is_active' => 1,
        ]);

        factory(Event::class, 20)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
