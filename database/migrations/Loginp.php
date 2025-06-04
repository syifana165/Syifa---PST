<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migration.
     */
    public function up()
    {
        Schema::create('login_pengguna', function (Blueprint $table) {
            $table->id(); // Auto increment primary key
            $table->string('email')->unique(); // Username harus unik
            $table->string('password'); // Password yang akan di-hash
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Rollback migration jika diperlukan.
     */
    public function down()
    {
        Schema::dropIfExists('login_pengguna');
    }
};
