<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TDetallesBit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detalle' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'producto' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ],
            'tegnologia' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ],
            'criticidad' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2', '3'],
                'default'    => '1',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'comentario' => [
                'type'       => 'TEXT',
                'constraint' => '100',
                'null' => true
            ],
            'alertado' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '2'],
                'default'    => '2',
            ],
            'razon' => [
                'type'       => 'TEXT',
                'constraint' => '100',
                'null' => true
            ],
            'id_bitacora' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            
            
        ]);
        $this->forge->addKey('id_detalle', true);
        $this->forge->createTable('t_detalle_bit');
    }

    public function down()
    {
        $this->forge->dropTable('t_detalle_bit');
    }
}
