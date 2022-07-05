<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Customers extends Seeder
{
    public function run()
    {
        $data = [
            'nombre' => 'DIANA'
        ];
        $data2 = [
            'nombre' => 'BCR'
        ];
        $data3 = [
            'nombre' => 'INTELECTOR'
        ];

        // Using Query Builder
        $this->db->table('t_clientes')->insert($data);
        $this->db->table('t_clientes')->insert($data2);
        $this->db->table('t_clientes')->insert($data3);
       
    }
}
