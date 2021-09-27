<?php

use App\Database\Seed;
use App\Models\User;
use Faker\Factory;

class UserSeeder extends Seed
{
    public function run(): void
    {
        $faker = Factory::create();

        $user = new User();
        $user->email = $faker->email;
        $user->first_name = $faker->firstName;
        $user->last_name = $faker->lastName;
        $user->password = password_hash('password', PASSWORD_DEFAULT);
        $user->save();
    }
}
