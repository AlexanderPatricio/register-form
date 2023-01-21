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
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 10)->unique()->nullable(FALSE);
            $table->string('codigo_dactilar', 10)->nullable();
            $table->string('nombres', 100)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('canton', 50)->nullable();
            $table->string('parroquia', 50)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('correo', 50)->nullable();
            $table->string('celular', 13)->nullable();
            $table->string('convencional', 15)->nullable();
            $table->string('estado_civil', 10)->nullable();
            $table->string('cedula_conyuge', 10)->nullable();
            $table->string('nombres_conyuge', 100)->nullable();
            $table->integer('numero_hijos')->default(0)->nullable();
            $table->string('comprobante_deposito', 150)->nullable();
            $table->string('frontal_cedula', 150)->nullable();
            $table->string('posterior_cedula', 150)->nullable();
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
        Schema::dropIfExists('datos');
    }
};
