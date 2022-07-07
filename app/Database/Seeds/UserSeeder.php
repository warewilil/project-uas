<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'warius@wilil.com',
            'nama'     => 'Warius Wilil',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role'     => 'Admin',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];

        $this->db->table('users')->insert($data);
    }
}
