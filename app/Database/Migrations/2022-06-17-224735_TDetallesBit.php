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
            'dispositivo' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ],
            'id_cliente' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'tecnologia' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ],
            'id_origen' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'categoria' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ],
            'criticidad' => [
                'type'       => 'ENUM',
                'constraint' => ['ALTA', 'MEDIA', 'BAJA'],
                'default'    => 'BAJA',
            ],
            'hora' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'desc' => [
                'type'       => 'TEXT',
                'null' => false
            ],
            'comentario' => [
                'type'       => 'TEXT',
                'null' => false
            ],
            'reportado' => [
                'type'       => 'ENUM',
                'constraint' => ['SI', 'NO'], 
                'default'    => 'NO',
            ],
            'razon' => [
                'type'       => 'TEXT',
                'constraint' => '300',
                'null' => true
            ],
            'id_bitacora' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ], 
            'seguimineto' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'], //1= dar seguimiento // 0= No dar seguimiento
                'default'    => '0',
            ],           
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['1', '0'], //1= activo // 0= borrado
                'default'    => '1',
            ]
            
        ]);
        $this->forge->addKey('id_detalle', true);
        $this->forge->addForeignKey('id_bitacora' , 't_bitacora','id_bitacora','CASCADE','CASCADE');
        $this->forge->createTable('t_detalle_bit');
    }

    public function down()
    {
        $this->forge->dropTable('t_detalle_bit');
    }
}
