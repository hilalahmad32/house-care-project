<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'cat_id' => rand(1, 8),
            'service_name' => 'services ' . rand(1, 8),
            'image' => 'https://images.unsplash.com/photo-1606738132449-e3590ddb6793?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nzh8fHNlcnZpY2VzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=400',
            'loc_id' => rand(1, 3)
        ];

        // Using Query Builder
        $this->db->table('services')->insert($data);
    }
}
