<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name' => 'Leandro Sierra García',
            'email' => 'leandrosiegar@gmail.com',
            'password' => bcrypt('12345678')
            ]
            );
        User::factory(99)->create();
    }
}
