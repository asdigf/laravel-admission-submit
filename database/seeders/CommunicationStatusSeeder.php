<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunicationStatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('communication_logs')->insert([
            [
                'application_id' => 'APP-2025-1001',
                'action' => 'send_reminder',
                'template' => 'application_accepted',
                'sent_to' => 'lamgiahunghpt023@gmail.com',
                'sent_at' => now()
            ],
            [
                'application_id' => 'APP-2025-1002',
                'action' => 'send_reminder',
                'template' => 'application_rejected',
                'sent_to' => 'hungnt@example.com',
                'sent_at' => now()
            ]
        ]);
    }
}
