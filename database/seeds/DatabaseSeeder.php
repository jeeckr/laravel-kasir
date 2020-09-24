<?php

use App\Admin;
use App\Employee;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Employee::create([
            'name' => 'pegawai',
            'address' => 'surabaya',
            'phone' => 86665656666,
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
