<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Feedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'fb_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'feedback'       => [
                'type'       => 'TEXT',
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'rating'       => [
                'type'       => 'INT',
            ],
            'user_image'       => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
        ]);
        $this->forge->addKey('fb_id', true);
        $this->forge->createTable('feedbacks');
    }

    public function down()
    {
        $this->forge->dropTable('feedbacks');
    }
}
