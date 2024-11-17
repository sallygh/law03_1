<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id(); // الرقم التسلسلي
            $table->string('property_number'); // رقم العقار
            $table->string('real_estate_area'); // المنطقة العقارية
            $table->string('share_quota'); // الحصة السهمية
            $table->float('area'); // المساحة
            $table->string('direction'); // الاتجاه
            $table->string('address'); // العنوان
            $table->string('financial'); // المالية
            $table->string('previous_signs'); // إشارات سابقة
            $table->text('notes')->nullable(); // ملاحظات
            $table->json('attachments')->nullable(); // مرفقات
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
