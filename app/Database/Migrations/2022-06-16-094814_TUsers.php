<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'user'], 
                'null' => false
            ],
            
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('t_users');
    }

    public function down()
    {
        $this->forge->dropTable('t_users');
    }
}
