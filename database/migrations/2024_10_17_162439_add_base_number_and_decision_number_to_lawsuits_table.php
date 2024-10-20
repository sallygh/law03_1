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
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->integer('base_number')->nullable();
            $table->integer('decision_number')->nullable();
        });
    }

    public function down()
    {
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->dropColumn('base_number');
            $table->dropColumn('decision_number');
        });
    }
};
