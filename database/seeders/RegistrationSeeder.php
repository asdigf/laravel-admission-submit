<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    public function run()
    {
        DB::table('registrations')->insert([
            [
                'student_name' => 'Lâm Gia Hưng',
                'email' => 'lamgiahunghpt023@gmail.com',
                'programme' => 'Khoa Học Dữ Liệu',
                'intake' => '2025',
                'phone' => '0123456789'
            ],
            [
                'student_name' => 'Nguyễn Thiên Hùng',
                'email' => 'hungnt@example.com',
                'programme' => 'CNPM',
                'intake' => '2024',
                'phone' => '0987654321'
            ]
        ]);
    }
}
