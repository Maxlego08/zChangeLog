<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zchangelog_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('change_log_id');
            $table->unsignedInteger('order')->default(0);
            $table->string('level')->default('info');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('change_log_id')->references('id')->on('zchangelog_change_logs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zchangelog_updates');
    }
}
