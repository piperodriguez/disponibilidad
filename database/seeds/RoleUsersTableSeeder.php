<?php

use Illuminate\Database\Seeder;
use App\Modelos\UsersRole;
class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersRole::create([
        	'role_id' => 1,
        	'user_id' => 1
        ]);
        UsersRole::create([
        	'role_id' => 2,
        	'user_id' => 2
        ]);
    }
}
