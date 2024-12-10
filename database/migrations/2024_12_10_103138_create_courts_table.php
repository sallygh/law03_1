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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('court_number')->unique();
            $table->enum('lawsuit_status', ['انتظار', 'دراسة', 'تم التسجيل', 'تم الفصل'])->default('انتظار');
            $table->integer('base_number')->nullable();
            $table->integer('decision_number')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courts');
    }
};
