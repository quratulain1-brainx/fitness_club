<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;
use App\Role;
//use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('role_user')->turncate();

      $admin= Role::where('name','admin')->first();
      $trainer= Role::where('name','trainer')->first();
      $member= Role::where('name','member')->first();
    }
}
