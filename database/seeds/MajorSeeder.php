<?php

use Illuminate\Database\Seeder;
use App\Majors;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_code = [
            // FEB
            'FEBD301', 'FEBD302', 'FEBS101', 'FEBS102', 'FEBS103', 'FEBS104', 'FEBS201',
            // FK
            'FKS101', 'FKPROF',
            // FT
            'FTS101', 'FTS102', 'FTS103',
            // FISIP
            'FISIPS101', 'FISIPS102', 'FISIPS103',
            // FIK
            'FIKD301', 'FIKS101', 'FIKS102',
            // FH
            'FHS101', 'FHS201',
            // FIKES
            'FIKESD301', 'FIKESD302', 'FIKESS101', 'FIKESS102', 'FIKESS103', 'FIKESPROF'
        ];
        $major_name = [
            // FEB
            'D3 Perbankan dan Keuangan', 'D3 Akuntansi', 'S1 Manajemen', 'S1 Akuntansi', 'S1 Ekonomi Pembangunan', 'S1 Ekonomi Syariah', 'S2 Manajemen',
            // FK
            'S1 Kedokteran', 'Pendidikan Profesi Ners',
            // FT
            'S1 Teknik Mesin', 'S1 Teknik Industri', 'S1 Teknik Perkapalan',
            // FISIP
            'S1 Ilmu Komunikasi', 'S1 Hubungan Internasional', 'S1 Ilmu Politik',
            // FIK
            'D3 Sistem Informasi', 'S1 Sistem Informasi', 'S1 Informatika',
            // FH
            'S1 Hukum', 'S2 Hukum',
            // FIKES
            'D3 Keperawatan', 'D3 Fisioterapi', 'S1 Keperawatan', 'S1 Kesehatan Masyarakat', 'S1 Gizi', 'Pendidikan Profesi Ners'
        ];

        for ($i=0; $i < count($major_code); $i++) { 
            if ($i < 7) {
                $faculty_code = 1;
            } elseif($i >= 7 && $i <= 8) {
                $faculty_code = 2;
            } elseif($i >= 9 && $i <= 11) {
                $faculty_code = 3;
            } elseif($i >= 12 && $i <= 14) {
                $faculty_code = 4;
            } elseif($i >= 15 && $i <=17) {
                $faculty_code = 5;
            } elseif($i >= 18 && $i <= 19) {
                $faculty_code = 6;
            } elseif($i >= 20) {
                $faculty_code = 7;
            }
            Majors::create([
                'major_code' => $major_code[$i],
                'name' => $major_name[$i],
                'faculty_id' => $faculty_code
            ]);
        }
    }
}
