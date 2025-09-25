<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->string('application_id', 20)->primary();
            $table->string('applicant_name');
            $table->string('email')->nullable();
            $table->string('programme');
            $table->string('intake');
            $table->enum('status', ['Submitted','Accepted','Rejected'])->default('Submitted');
            $table->enum('payment_status', ['unpaid','partial','paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
