<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FeedBackSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'feedback' => '
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, maiores distinctio adipisci voluptatibus aliquam laudantium sint veritatis eveniet maxime repellendus!',
            'service_name' => 'services ' . rand(1, 30),
            'image' => 'https://images.unsplash.com/photo-1556745753-b2904692b3cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzR8fHNlcnZpY2VzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=400&q=60'
        ];

        // Using Query Builder
        $this->db->table('services')->insert($data);
    }
}
