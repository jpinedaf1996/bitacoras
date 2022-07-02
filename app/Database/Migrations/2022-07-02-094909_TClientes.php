<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TClientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cliente' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'varchar',
                'constraint' => '200',
            ]
            
        ]);
        $this->forge->addKey('id_cliente', true);
        $this->forge->createTable('t_clientes');
    }

    public function down()
    {
        $this->forge->dropTable('t_clientes');
    }
}
