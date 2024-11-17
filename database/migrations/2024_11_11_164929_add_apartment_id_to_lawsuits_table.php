<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApartmentIdToLawsuitsTable extends Migration
{
    public function up()
    {
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id')->nullable()->after('id');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('lawsuits', function (Blueprint $table) {
            $table->dropForeign(['apartment_id']);
            $table->dropColumn('apartment_id');
        });
    }
}
