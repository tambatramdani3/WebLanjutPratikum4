<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Mahasiswa extends Seeder
{
    public function run()
    {
        $data_mahasiswa = [
        [
            'npm' => '1717051032',
            'nama'    => 'Riki Sofyan',
            'alamat'    => 'Bandarlampung',
            'created_at'    => Time::now(),
            // 'updated_at'    => ,
        ],
        [
            'npm' => '1717051034',
            'nama'    => 'Tambat Ramdani',
            'alamat'    => 'Krui',
            'created_at'    => Time::now(),
            // 'updated_at'    => ,
        ],
        [
            'npm' => '1717051072',
            'nama'    => 'Zakiamans',
            'alamat'    => 'Jakarta',
            'created_at'    => Time::now(),
            // 'updated_at'    => ,
        ]
        ];

        // Simple Queries
        foreach($data_mahasiswa as $data){
            $this->db->table('mahasiswa')->insert($data);
        }
    }
}