<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'  => 'admin',
            'nip'   => '0023088701',
            'email' => 'admin@upnvj.ac.id',
            'password' => bcrypt('password')
        ]);
    }
}
