<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'category_name' => 'category ' . rand(1, 30),
            'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjF8fHNlcnZpY2VzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=400'
        ];

        // Using Query Builder

        $this->db->table('categories')->insert($data);
    }
}
