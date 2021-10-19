<?php

use App\User;
use App\Carta;
use App\Imagen;
use App\Reserva;
use App\Producto;
use App\TipoUsuario;
use App\Establecimiento;
use App\PuntuacionProducto;
use App\PuntuacionEstablecimiento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!Schema::hasTable('users')){
            Schema::disableForeignKeyConstraints();
        
            User::truncate();
            TipoUsuario::truncate();
            Reserva::truncate();
            Carta::truncate();
            Imagen::truncate();
            Producto::truncate();
            Establecimiento::truncate();
            PuntuacionProducto::truncate();
            PuntuacionEstablecimiento::truncate();
            
            $this->call(TipoUsuarioSeeder::class);
    
            foreach (range(1, 20) as $i){
                $u = factory(User::class)->create();
                $u->usuarios_tipo()->attach(TipoUsuario::all()->random());
            }
    
            factory(Establecimiento::class,4)->create();
            factory(Reserva::class,20)->create();
            factory(Carta::class, 4)->create(); 
            factory(Producto::class,100)->create();
            factory(PuntuacionEstablecimiento::class,50)->create();
            factory(PuntuacionProducto::class,50)->create();
            factory(Imagen::class,200)->create();
    
            Schema::enableForeignKeyConstraints();   
        }
            
    }
}
