<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();
        $user = User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
        ],[
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'dateBirth' => now(),
            'password' => bcrypt('123456'),
        ]);
        $role = Role::where('name', 'admin')->first();
        $user->role()->associate($role);
        $user->save();

        $user2 = User::updateOrCreate([
            'name' => 'user',
            'email' => 'user@user.com.br',
        ],[
            'name' => 'user',
            'email' => 'user@user.com.br',
            'dateBirth' => now(),
            'password' => bcrypt('123456'),
        ]);
        $role = Role::getLowestRole();
        $user2->role()->associate($role);
        $user2->save();
    }
}
