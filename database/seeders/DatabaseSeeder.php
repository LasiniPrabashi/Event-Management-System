<?php

namespace Database\Seeders;

use App\Models\Events;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $this->call(EventSeeder::class);
        $this->call(InvitetionSeeder::class);
      
    }
}
