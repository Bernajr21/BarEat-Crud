<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre_establecimiento', 100);
            $table->text('descripcion_establecimiento');
            $table->string('dirección_establecimiento');
            $table->string('num_telefono')->nullable();
            $table->string('email')->unique();
            $table->double('latitud', 8, 2)->nullable();
            $table->double('longitud', 8, 2)->nullable();
            $table->string('tipo_establecimiento', 100);
            $table->string('nif')->unique();
            $table->integer('maximo_numero_comensales');
            $table->integer('aforo');
            $table->string('ruta_foto_principal')->nullable();
            $table->integer('puntuacion_media_establecimiento')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('es_premium')->nullable();
            $table->integer('total_puntuaciones')->nullable();

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('establecimientos');
    }
}
