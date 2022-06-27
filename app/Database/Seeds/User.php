<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $password= password_hash('123',PASSWORD_DEFAULT);
        $admin = [
            'name' => 'admin',
            'user'    => 'admin@bitacora.com',
            'password'    => $password,
            'type'    => 'admin',
        ];
        $user = [
            'name' => 'jesus.pineda',
            'user'    => 'jesus.pineda@bit.com',
            'password'    => $password,
            'type'    => 'admin',
        ];

        // Using Query Builder
        $this->db->table('t_users')->insert($admin);
        $this->db->table('t_users')->insert($user);
    }
}
