<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1'),
            'role' => 'admin'
        ]);
    }
}
