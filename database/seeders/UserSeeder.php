<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory()
                ->create([
                    'name' => 'Lucas Reichert',
                    'email' => 'lucas.reichert@redes.ufsm.br',
                    'password' => bcrypt('password'),
                ]);
        User::factory()->times(10)->create();
    }
}
