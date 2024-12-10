<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->dropColumn(['court', 'court_number', 'lawsuit_status', 'base_number', 'decision_number']);
        });
    }

    public function down()
    {
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->string('court')->nullable();
            $table->string('court_number')->nullable();
            $table->string('lawsuit_status')->nullable();
            $table->integer('base_number')->nullable();
            $table->integer('decision_number')->nullable();
        });
    }
};
