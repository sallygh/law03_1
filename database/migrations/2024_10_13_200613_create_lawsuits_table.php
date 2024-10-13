<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->id();
            $table->string('lawsuit_type'); // تصنيف الدعوى
            $table->string('lawsuit_subject'); // موضوع الدعوى
            $table->string('court'); // المحكمة
            $table->string('court_number'); // رقم المحكمة
            $table->string('plaintiff_name'); // اسم المدعي
            $table->string('defendant_name'); // اسم المدعى عليه
            $table->string('lawsuit_status'); // حالة القضية
            $table->json('attachments')->nullable(); // مرفقات
            $table->decimal('agreed_amount', 10, 2); // المبلغ المتفق عليه
            $table->decimal('remaining_amount', 10, 2); // المبلغ المتبقي
            $table->decimal('paid_amount', 10, 2); // المبلغ المدفوع
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
