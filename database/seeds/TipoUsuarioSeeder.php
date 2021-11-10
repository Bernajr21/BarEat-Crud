<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        \App\TipoUsuario::truncate();
        \App\TipoUsuario::create(['tipo' => 'cliente',]);
        \App\TipoUsuario::create(['tipo' => 'propietario',]);

        Schema::enableForeignKeyConstraints();
    }
}
