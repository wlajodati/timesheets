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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id('timesheet_id');
            $table->date('date');
            $table->string('comment', 255)->nullable();
            $table->unsignedTinyInteger('status');
            $table->unsignedBigInteger('user_id');
            $table->datetime('created_at')->default(NULL);
            $table->datetime('updated_at')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
};
