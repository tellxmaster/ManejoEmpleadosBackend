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
        Schema::create('Empleado', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  // Unique code
            $table->string('firstName');
            $table->string('lastName');
            $table->string('idNumber')->unique();
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('Provincia');
            $table->date('birthDate');
            $table->string('email');
            $table->text('personalObservations')->nullable();
            $table->string('photo')->nullable();
            $table->date('startDate');
            $table->string('position');
            $table->string('department');
            $table->string('employmentProvince');
            $table->boolean('partTime');
            $table->double('salary', 8, 2)->default(0);;
            $table->text('employmentObservations')->nullable();
            $table->string('status')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Empleado');
    }
};
