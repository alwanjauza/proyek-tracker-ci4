<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use \Myth\Auth\Password;

$faker = \Faker\Factory::create();

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'username' => $faker->firstName(),
                'email'    => $faker->email(),
                'password_hash' => Password::hash('astaganaga123'),
                'active' => 1,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::createFromTimestamp($faker->unixTime())
            ];

            // Using Query Builder
            $this->db->table('users')->insert($data);
        }
    }
}
