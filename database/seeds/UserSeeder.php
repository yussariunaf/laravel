<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        // $gender = ['L', 'P'];
        $gender = $faker->randomElement(['male', 'female']);
        // FEB -> 1510112000 - 1510112010
        $feb_nim   = 1610612000;
        $fk_nim    = 1610613000;
        $ft_nim    = 1610614000;
        $fisip_nim = 1610615000;
        $fik_nim   = 1610616000;
        $fh_nim    = 1610617000;
        $fikes_nim = 1610618000;
        // $ft_nim  = 1510514000;
        for ($i=0; $i < 70; $i++) { 
            
            if($i == 0) $nim = $feb_nim;
            if($i == 10) $nim = $fk_nim;
            if($i == 20) $nim = $ft_nim;
            if($i == 30) $nim = $fisip_nim;
            if($i == 40) $nim = $fik_nim;
            if($i == 50) $nim = $fh_nim;
            if($i == 60) $nim = $fikes_nim;

            User::create([
                 'name'           => $faker->name($gender),
                 'nim'            => $nim,
                 'ktp'            => $faker->nik(),
                 'phone'          => $faker->phoneNumber,
                 'gender'         => $gender,
                 'date_of_birth'  => $faker->dateTimeThisCentury->format('Y-m-d'),
                 'place_of_birth' => $faker->city,
                 'email'          => $faker->freeEmail,
                 'password'       => bcrypt('password')
            ]);
            $nim++;
        }
    }
}
