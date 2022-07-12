<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TOrigMonitoreo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_origen' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'herramienta' => [
                'type'       => 'varchar',
                'constraint' => '200',
            ]
            
        ]);
        $this->forge->addKey('id_origen', true);
        $this->forge->createTable('t_orig_monitoreo');
    }

    public function down()
    {
        $this->forge->dropTable('t_orig_monitoreo');
    }
}
