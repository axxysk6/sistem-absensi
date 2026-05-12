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
    Schema::table('kepala_sekolahs', function (Blueprint $table) {
        $table->string('nip')->after('id');
        $table->string('nama')->after('nip');
        $table->string('email')->nullable()->after('nama');
        $table->string('telepon')->nullable()->after('email');
        $table->text('alamat')->nullable()->after('telepon');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kepala_sekolahs', function (Blueprint $table) {
            //
        });
    }
};
