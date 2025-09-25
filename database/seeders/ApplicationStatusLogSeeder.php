<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusLogSeeder extends Seeder
{
    public function run()
    {
        DB::table('application_status_logs')->insert([
            [
                'application_id' => 'APP-2025-1001',
                'from_status' => 'Submitted',
                'to_status' => 'Accepted',
                'changed_by' => 'admin',
                'changed_at' => now()
            ],
            [
                'application_id' => 'APP-2025-1002',
                'from_status' => 'Submitted',
                'to_status' => 'Rejected',
                'changed_by' => 'admin',
                'changed_at' => now()
            ],
            [
                'application_id' => 'APP-2025-1003',
                'from_status' => 'Submitted',
                'to_status' => 'Submitted',
                'changed_by' => 'admin',
                'changed_at' => now()
            ]
        ]);
    }
}
