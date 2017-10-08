<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Amelito',
            'lname' => 'Alcuitas',
            'email' => 'amelitoalcuitasjr@gmail.com',
            'username' => 'uberfps',
            'password' => bcrypt('password'),
        ]);
    }
}
