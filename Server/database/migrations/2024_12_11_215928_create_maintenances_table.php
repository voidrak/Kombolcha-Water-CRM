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
        Schema::table('maintenances', function (Blueprint $table) {
            $table->string("address");
            $table->string("phone_number");
            $table->string("description");
            $table->foreignId("submitted_by")->constrained('users')->onDelete("cascade");
            $table->boolean("completed")->default(false);
            $table->boolean("approved")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maintenances', function (Blueprint $table) {
            //
        });
    }
};
