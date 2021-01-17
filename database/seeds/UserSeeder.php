<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => '1',
                'name' => 'Sumarno Sun',
                'username' => 'sumarno123',
                'email' => 'sumarno23@gmail.com',
                'password' => Hash::make('admin123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Parno eko',
                'username' => 'parnoeko123',
                'email' => 'parnoeko@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'eko doso',
                'username' => 'ekodoso222',
                'email' => 'ekodoso222@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Sumanto eko',
                'username' => 'sumanto23',
                'email' => 'sumanto23@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Susilo sun',
                'username' => 'susilo12',
                'email' => 'susilo12@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Sukijo',
                'username' => 'sukijo123',
                'email' => 'sukijo123@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Sukiman',
                'username' => 'sukiman123',
                'email' => 'sukiman123@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Sujono',
                'username' => 'sujono3',
                'email' => 'sujono3@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Krisna aji',
                'username' => 'krisnaaj123',
                'email' => 'krisnaaj123@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '2',
                'name' => 'Adiman',
                'username' => 'adiman122',
                'email' => 'adiman122@gmail.com',
                'password' => Hash::make('user123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
