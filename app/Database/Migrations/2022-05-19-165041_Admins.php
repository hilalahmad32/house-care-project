<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'contraint' => '255',
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'contraint' => '255',
            ],
        ]);
        $this->forge->addKey('admin_id', true);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
