<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Faculties;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faculty_code = [
            'FEB', 'FK', 'FT', 'FISIP', 'FIK', 'FH', 'FIKES'
        ];
        $faculty_name = [
            'Ekonomi dan Bisnis',
            'Kedokteran',
            'Teknik',
            'Ilmu Sosial dan Politik',
            'Ilmu Komputer',
            'Hukum',
            'Ilmu Kesehatan'
        ];
        for ($i=0; $i < count($faculty_code); $i++) { 
            Faculties::create([
                'faculty_code' => $faculty_code[$i],
                'name' => $faculty_name[$i]
            ]);
        }
    }
}
