<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->string('document', 20)->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->string('address', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->date('birth')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->dateTime('created_at')->default(NULL);
            $table->datetime('updated_at')->default(NULL);
            $table->dateTime('deleted_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
