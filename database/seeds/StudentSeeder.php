<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $feb_nim = 1 - 10; fac = 1; major = 1 - 7 
        // $fk_nim  = 11 - 20; fac = 2; major = 8 - 9
        // $ft_nim  = 21 - 30; fac = 3; major = 10 - 12
        // $fisip_nim  = 31 - 40; fac = 4; major = 13 - 15
        // $fik_nim = 41 - 50; fac = 5; major = 16 - 18
        // $fh_nim  = 51 - 60; fac = 6; major = 19 - 20;
        // $fikes_nim = 61 - 70; fac = 7; major =  21 - 25

        $feb_majors   = [1, 2, 3, 4, 5, 6, 7];
        $fk_majors    = [8, 9];
        $ft_majors    = [10, 11, 12];
        $fisip_majors = [13, 14, 15];
        $fik_majors   = [16, 17, 18];
        $fh_majors    = [19, 20];
        $fikes_majors = [21, 22, 23, 24, 25];

        for ($i=1; $i <= 70; $i++) { 

            if($i > 0  && $i <= 10) { $fac = 1; $major = $feb_majors[array_rand($feb_majors)]; }
            if($i > 10 && $i <= 20) { $fac = 2; $major = $fk_majors[array_rand($fk_majors)]; }
            if($i > 20 && $i <= 30) { $fac = 3; $major = $ft_majors[array_rand($ft_majors)]; }
            if($i > 30 && $i <= 40) { $fac = 4; $major = $fisip_majors[array_rand($fisip_majors)]; }
            if($i > 40 && $i <= 50) { $fac = 5; $major = $fik_majors[array_rand($fik_majors)]; }
            if($i > 50 && $i <= 60) { $fac = 6; $major = $fh_majors[array_rand($fh_majors)]; }
            if($i > 60 && $i <= 70) { $fac = 7; $major = $fikes_majors[array_rand($fikes_majors)]; }

            Student::create([
                'user_id'    => $i,
                'faculty_id' => $fac,
                'major_id'   => $major
            ]);
        }
    }
}
