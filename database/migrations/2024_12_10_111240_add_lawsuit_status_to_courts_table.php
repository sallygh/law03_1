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
        Schema::table('courts', function (Blueprint $table) {
            $table->enum('lawsuit_status', ['انتظار', 'دراسة', 'تم التسجيل', 'تم الفصل'])->default('انتظار');
        });
    }

    public function down()
    {
        Schema::table('courts', function (Blueprint $table) {
            $table->dropColumn('lawsuit_status');
        });
    }
};
