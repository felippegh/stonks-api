<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        User::query()->create([
            'name'     => 'root',
            'password' => config('app.admin_password'),
            'email'    => 'admin@admin.com',
        ]);
    }
}
