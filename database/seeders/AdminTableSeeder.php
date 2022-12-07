<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminData = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gamil.com',
                'password' => bcrypt('admin002'),
                'gender' => 'male',
                'role' => 'super_admin',
                'status' => 1,
            ],
            [
                'name' => 'ram',
                'username' => 'ram',
                'email' => 'ram@gamil.com',
                'password' => bcrypt('ram002'),
                'gender' => 'male',
                'role' => 'admin',
                'status' => 1,
            ]
        ];

        foreach ($adminData as $data) {
            Admin::create($data);
        }
    }
}
