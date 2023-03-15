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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("kana")->nullable();
            $table->string("initial")->nullable();
            $table->string("zip")->nullable();
            $table->string("pref")->nullable();
            $table->string("address1")->nullable();
            $table->string("address2")->nullable();
            $table->string("tel")->nullable();
            $table->string("fax")->nullable();
            $table->string("login_id")->unique();
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
