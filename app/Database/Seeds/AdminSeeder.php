<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'hilal123',
            'password' => password_hash('hilal123', PASSWORD_DEFAULT)
        ];

        // Using Query Builder

        $this->db->table('admins')->insert($data);
    }
}
