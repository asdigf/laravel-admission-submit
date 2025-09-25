<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('communication_logs', function (Blueprint $table) {
            $table->string('application_id');
            $table->string('action');
            $table->string('template');
            $table->string('sent_to');
            $table->timestamp('sent_at');
            $table->primary(['application_id', 'sent_at']); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communication_logs');
    }
};
