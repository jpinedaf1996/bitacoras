<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TBitacora extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bitacora' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'fecha' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'description' => [
                'type'       => 'TEXT',
                'constraint' => '100',
                'null' => true
            ],
            'turno' => [
                'type'       => 'varchar',
                'constraint' => '100',
                'null' => false
            ],
            'id_pais' => [
                'type'       => 'INT',
                'constraint' => '2',
            ]
            
        ]);
        $this->forge->addKey('id_bitacora', true);
        $this->forge->createTable('t_bitacora');
    }

    public function down()
    {
        $this->forge->dropTable('t_bitacora');
    }
}
