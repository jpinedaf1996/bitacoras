<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TPais extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pais' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ]
            
        ]);
        $this->forge->addKey('id_pais', true);
        $this->forge->createTable('t_pais');
    }

    public function down()
    {
        $this->forge->dropTable('t_pais');
    }
}
