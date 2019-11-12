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
        User::create([
        	'username' => 'frodriguez',
        	'email' => 'vargasjuan367@gmail.com',
        	'password' => bcrypt('solati123')
        ]);
        User::create([
            'username' => 'yvcastiblanco',
            'email' => 'yvcastiblanco5@gmail.com',
            'password' => bcrypt('romanoymichuz')
        ]);
    }
}
