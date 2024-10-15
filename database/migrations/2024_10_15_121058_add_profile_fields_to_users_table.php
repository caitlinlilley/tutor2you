<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')->nullable(); // Add bio field
            $table->string('expertise')->nullable(); // Add expertise field
            $table->string('availability')->nullable(); // Add availability field
            $table->string('pricing')->nullable(); // Add pricing field
            $table->string('qualifications')->nullable(); // Add qualifications field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bio', 'expertise', 'availability', 'pricing', 'qualifications']);
        });
    
    }
};
