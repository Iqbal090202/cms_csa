<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Blog;
use App\Models\WorkPlan;
use App\Models\VisiMisi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret')
        ]);
        Blog::factory(10)->create();
        WorkPlan::factory(6)->create();
        VisiMisi::factory(6)->create();
    }
}
