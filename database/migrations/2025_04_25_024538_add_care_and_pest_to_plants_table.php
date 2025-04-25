<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::table('plants', function (Blueprint $table) {
        $table->text('care_info')->nullable();
        $table->string('watering_schedule')->nullable();
        $table->text('pest_control')->nullable();
    });
}

public function down()
{
    Schema::table('plants', function (Blueprint $table) {
        $table->dropColumn(['care_info', 'watering_schedule', 'pest_control']);
    });
}

};
