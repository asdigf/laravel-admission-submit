<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    public function run()
    {
        DB::table('applications')->insert([
            [
                'application_id' => 'APP-2025-1001',
                'applicant_name' => 'Lâm Gia Hưng',
                'email' => 'lamgiahunghpt023@gmail.com',
                'programme' => 'Khoa Học Dữ Liệu',
                'intake' => '2025',
                'status' => 'Accepted',
                'payment_status' => 'unpaid'
            ],
            [
                'application_id' => 'APP-2025-1002',
                'applicant_name' => 'Nguyễn Thiên Hùng',
                'email' => 'hungnt@example.com',
                'programme' => 'CNPM',
                'intake' => '2024',
                'status' => 'Rejected',
                'payment_status' => 'partial'
            ],
            [
                'application_id' => 'APP-2025-1003',
                'applicant_name' => 'Trần Minh Tuấn',
                'email' => 'tuanminh@example.com',
                'programme' => 'AI & ML',
                'intake' => '2025',
                'status' => 'Submitted',
                'payment_status' => 'unpaid'
            ]
        ]);
    }
}
