<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();

            $table->string('ruta_imagen');
            $table->text('descripcion_imagen')->nullable();
            $table->double('ancho')->nullable();
            $table->double('alto')->nullable();
            $table->foreignId('establecimiento_id')
                    ->nullable()
                    ->constrained('establecimientos')
                    ->onDelete('cascade');
            $table->foreignId('producto_id')
                    ->nullable()
                    ->constrained('productos')
                    ->onDelete('cascade');;
            $table->foreignId('anuncio_id')
                    ->nullable()
                    ->constrained('anuncios')
                    ->onDelete('cascade');
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->onDelete('cascade');
            
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
        Schema::dropIfExists('imagenes');
    }
}
