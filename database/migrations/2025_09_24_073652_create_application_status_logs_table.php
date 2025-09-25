<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('application_status_logs', function (Blueprint $table) {
            $table->string('application_id');
            $table->string('from_status');
            $table->string('to_status');
            $table->string('changed_by');
            $table->timestamp('changed_at');
            $table->primary(['application_id', 'changed_at']); 
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('application_status_logs');
    }
};
