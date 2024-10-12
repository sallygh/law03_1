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
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // تصنيف الدعوى
            $table->string('subject'); // موضوع الدعوى
            $table->string('status'); // حالة القضية
            $table->text('details')->nullable(); // تفاصيل أخرى
            $table->string('court'); // محكمة
            $table->text('notes')->nullable(); // ملاحظات
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawsuits');
    }
};
