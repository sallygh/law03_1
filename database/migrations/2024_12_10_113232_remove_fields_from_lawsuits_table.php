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
            $table->dropColumn(['plaintiff_name', 'defendant_name', 'agreed_amount', 'remaining_amount', 'paid_amount']);
        });
    }

    public function down()
    {
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->string('plaintiff_name')->nullable();
            $table->string('defendant_name')->nullable();
            $table->decimal('agreed_amount', 8, 2)->nullable();
            $table->decimal('remaining_amount', 8, 2)->nullable();
            $table->decimal('paid_amount', 8, 2)->nullable();
        });
    }
};
