<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'location' => 'mumbai',
        ];

        // Using Query Builder
        $this->db->table('locations')->insert($data);
    }
}
