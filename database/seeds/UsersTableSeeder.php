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
        $user = new \App\Models\User();
        $user->name = 'admin';
        $user->full_name = 'ADMIN';
        $user->nickname = 'admin';
        $user->email = 'info@fundstart.vn';
        $user->password = bcrypt('123456');
        $user->telephone = '0437171188';
        $user->website = 'http://www.fundstart.vn/';
        $user->status = 'active';
        $user->save();
    }
}
