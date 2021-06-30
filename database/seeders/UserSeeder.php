<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    static $_users = [
        [
            'name' => 'Tom Kuijer',
            'password' => 'tomkuijer',
            'email' => 'admin@localhost'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        foreach (static::$_users as $seed_user) {
            $user = new User();
            $user->name = $seed_user['name'];
            $user->email = $seed_user['email'];
            $user->password = Hash::make($seed_user['password']);
            $user->save();
        }
    }
}
