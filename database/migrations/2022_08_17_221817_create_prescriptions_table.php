<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->text('diagnosis');
            $table->text('inscription'); //medication prescribed
            $table->text('subscription'); //instructions to pharmacist
            $table->text('signa'); //directions to patient
            $table->string('e-sig');
            $table->string('license_number');
            $table->string('ptr_number')->nullable();
            $table->unsignedBigInteger('appointment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
};
