<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->if_username = 'ichsan';
        $user->if_password = bcrypt('ichsan');
        $user->save();
    }
}
