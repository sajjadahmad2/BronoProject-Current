<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        User::truncate();
        User::insert([
            [
                'id' => 1,
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'location_id' => '0fu8c2Te17KqLDYyr8RE',
                'phone' => null,
                'name' => '',
                'email' => 'superadmin@gmail.com',
                'profile_photo_path' => null,
                'email_verified_at' => null,
                'password' => Hash::make('12345678'), // Hash the password
                'address' => null,
                'photo' => 'uploads/profile/Super-Admin-1722691679.png',
                'status' => 1,
                'enable_design' => 1,
                'avatar' => null,
                'remember_token' => null,
                'added_by' => 1,
                'created_at' => '2024-07-09 04:12:04',
                'updated_at' => '2024-09-24 17:45:56',
                'last_login_at' => '2024-09-24 22:45:56',
                'last_login_ip' => '127.0.0.1',
            ],
            [
                'id' => 2,
                'first_name' => 'Muhammad',
                'last_name' => 'Sabir',
                'location_id' => 'vcLxBfw01Nmv2VnlhtND',
                'phone' => null,
                'name' => '',
                'email' => 'sabir@gmail.com',
                'profile_photo_path' => null,
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'address' => null,
                'photo' => null,
                'status' => 1,
                'enable_design' => 1,
                'avatar' => null,
                'remember_token' => null,
                'added_by' => 1,
                'created_at' => '2024-07-09 04:13:32',
                'updated_at' => '2024-09-20 11:30:23',
                'last_login_at' => null,
                'last_login_ip' => null,
            ],
            [
                'id' => 4,
                'first_name' => 'Bruno',
                'last_name' => 'De Troch',
                'location_id' => '0fu8c2Te17KqLDYyr8RE',
                'phone' => null,
                'name' => '',
                'email' => 'bruno@gmail.com',
                'profile_photo_path' => null,
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'address' => null,
                'photo' => 'uploads/profile/Bruno-De Troch-1722690448.png',
                'status' => 1,
                'enable_design' => 1,
                'avatar' => null,
                'remember_token' => null,
                'added_by' => 1,
                'created_at' => '2024-08-01 02:44:56',
                'updated_at' => '2024-09-04 12:32:02',
                'last_login_at' => null,
                'last_login_ip' => null,
            ],
        ]);
    }
}
