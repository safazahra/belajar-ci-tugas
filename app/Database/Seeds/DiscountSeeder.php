<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal' => '2026-07-09',
                'nominal' => 100000,
            ],
            [
                'tanggal' => '2026-07-10',
                'nominal' => 100000,
            ],
            [
                'tanggal' => '2026-07-11',
                'nominal' => 200000,
            ],
            [
                'tanggal' => '2026-07-12',
                'nominal' => 150000,
            ],
            [
                'tanggal' => '2026-07-13',
                'nominal' => 250000,
            ],
            [
                'tanggal' => '2026-07-14',
                'nominal' => 300000,
            ],
            [
                'tanggal' => '2026-07-15',
                'nominal' => 300000,
            ],
            [
                'tanggal' => '2026-07-16',
                'nominal' => 300000,
            ],
            [
                'tanggal' => '2026-07-17',
                'nominal' => 300000,
            ],
            [
                'tanggal' => '2026-07-18',
                'nominal' => 300000,
            ],
        ];

        $this->db->table('discounts')->insertBatch($data);
    }
}
