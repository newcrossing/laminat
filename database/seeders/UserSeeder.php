<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::transaction(function ()  {
            $user = User::create([
                'login' => 'admin',
                'name' => 'admin',
                'password' => Hash::make('87654321')
            ]);
            Role::create(['name' => 'user']);
            Role::create(['name' => 'admin']);

            $user->assignRole('user');
            $user->assignRole('admin');
        });

    }
}
