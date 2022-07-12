<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Origin extends Seeder
{
    public function run()
    {
        $origen1 = [
            'herramienta' => 'NEMS',
        ];
        $origen2 = [
            'herramienta' => 'TM - EMAIL SECURITY',
        ];
        $origen3 = [
            'herramienta' => 'ME  - EVENLOG',
        ];
        
        // Using Query Builder
        $this->db->table('t_orig_monitoreo')->insert($origen1);
        $this->db->table('t_orig_monitoreo')->insert($origen2);
        $this->db->table('t_orig_monitoreo')->insert($origen3);
        
    }
}
