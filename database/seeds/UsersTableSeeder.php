<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
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
//        DB::table('users_roles')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $trainerRole = Role::where('name','trainer')->first();
        $memberRole = Role::where('name','member')->first();

        $admin =User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234')
        ]);
        $trainer =User::create([
            'name' => 'trainer',
            'email' => 'trainer@trainer.com',
            'password' => Hash::make('1234')
        ]);
        $member =User::create([
            'name' => 'member',
            'email' => 'member@member.com',
            'password' => Hash::make('1234')
        ]);

        $admin->roles()->attach($adminRole);
        $trainer->roles()->attach($trainerRole);
        $member->roles()->attach($memberRole);
    }
}
