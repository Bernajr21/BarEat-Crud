<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre_producto');
            $table->text('descripcion_producto');
            $table->double('precio_producto');
            $table->string('tipo_producto', 100);
            $table->foreignId('carta_id')->constrained('cartas')->onDelete('cascade');;
            $table->integer('puntuacion_media_producto')->nullable();
            $table->string('ruta_foto_principal')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
