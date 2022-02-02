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
        ], [
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'admin' => 1,
            'cpf' => '000.000.000-00',
            'identity' => '00000-0',
            'phone' => '(00) 0 0000-0000',
            'dateBirth' => now(),
            'password' => bcrypt('123456'),
        ]);
        $user->save();

        $user2 = User::updateOrCreate([
            'name' => 'user',
            'email' => 'user@user.com.br',
        ], [
            'name' => 'user',
            'email' => 'user@user.com.br',
            'dateBirth' => now(),
            'cpf' => '000.000.000-01',
            'identity' => '00000-1',
            'phone' => '(00) 0 0000-0001',
            'password' => bcrypt('123456'),
        ]);
        $user2->save();
    }
}
