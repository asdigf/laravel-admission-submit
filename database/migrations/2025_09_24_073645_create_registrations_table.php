<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->string('email')->primary(); 
            $table->string('student_name');
            $table->string('programme');
            $table->string('intake');
            $table->string('phone');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
