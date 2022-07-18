<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        //$password= password_hash('123',PASSWORD_DEFAULT);
        $user = [
            'user' => 'jesus.pineda',
            'email'    => 'admin@elotitos.local',
            'type'    => 'admin',
        ];
        $this->db->table('t_users')->insert($user);
    }
}
