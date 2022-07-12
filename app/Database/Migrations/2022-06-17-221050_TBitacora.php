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
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'fecha' => [
                'type'    => 'TIMESTAMP',
                'default' => date('Y-m-d H:i:s'),
            ],
            'descripcion' => [
                'type'       => 'TEXT',
                'constraint' => '200',
                'null' => true
            ],
            'turno' => [
                'type'       => 'varchar',
                'constraint' => '1',
                'null' => false
            ],
            'id_pais' => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['open', 'close'], //1= SI // 0= NO
                'default'    => 'open',
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
