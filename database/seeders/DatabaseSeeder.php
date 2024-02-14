<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)
        ->state(new Sequence(
            ['name' => 'Mary', 'email' => 'mary@mary-ui.com', 'dob' => '2000-06-20'],
            ['name' => 'Giovanna', 'email' => 'giovanna@mary-ui.com', 'dob' => '2017-03-10'],
            ['name' => 'Marina', 'email' => 'marina@mary-ui.com', 'dob' => '2019-01-01'],
        ))
        ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
