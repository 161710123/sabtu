<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "admin";
        $adminRole->save();

        //membuat role member
        $memberRole = new Role();
        $memberRole->name = "user";
        $memberRole->display_name = "user";
        $memberRole->save();

        //membuat sample admin
        $admin = new user();
        $admin->name = "admin";
        $admin->email = "admin@gmail.com";
        $admin->password =bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat sample member
        $member = new user();
        $member->name ="sample user";
        $member->email ="user@gmail.com";
        $member->password =bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);
    }
}
