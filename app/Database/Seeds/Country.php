<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Country extends Seeder
{
    public function run()
    {

        $data = [
            'pais' => 'SV - El Salvador'
        ];
        $data2 = [
            'pais' => 'NI - Nicaragua'
        ];

        // Using Query Builder
        $this->db->table('t_pais')->insert($data);
        $this->db->table('t_pais')->insert($data2);
    }
}
