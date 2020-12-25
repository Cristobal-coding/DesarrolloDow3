<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{Schema,DB};

use DateTime;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $tablas=['tipo_vehiculo','vehiculo'];
        Schema::disableForeignKeyConstraints();
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        Schema::enableForeignKeyConstraints();
        

        //Tipo Vehiculos
        $tipo_vehiculo=[
            ['nombre_tipo'=>'Coupe','valor_diario'=>30000],
            ['nombre_tipo'=>'Sedan','valor_diario'=>40000],
            ['nombre_tipo'=>'SUV','valor_diario'=>50000],
            ['nombre_tipo'=>'Camioneta','valor_diario'=>45000],
            ['nombre_tipo'=>'Moto','valor_diario'=>15000],
            ['nombre_tipo'=>'Furgoneta','valor_diario'=>50000],
            ['nombre_tipo'=>'Compact','valor_diario'=>20000],
            ['nombre_tipo'=>'Camion','valor_diario'=>30000],
            ['nombre_tipo'=>'Bus','valor_diario'=>100000]
        ];

        foreach($tipo_vehiculo as $tipo){
            DB::table('tipo_vehiculo')->insert([
                'nombre_tipo' => $tipo['nombre_tipo'],
                'valor_diario'=> $tipo['valor_diario'],
                'created_At' => new DateTime('NOW')
            ]);           
        }


        //Vehiculos
        $vehiculo=[
            ['id_vehiculo'=>'1','nombre_vehiculo'=>'Mazda MX-5','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','foto'=>'../Imgs/mx-5.jpg'],
            ['id_vehiculo'=>'2','nombre_vehiculo'=>'Ford Ranger 2019','marca'=>'Ford','nombre_tipo'=>
                'Camioneta','estado'=>'disponible','patente'=>'BB-CL-35','foto'=>'../Imgs/ranger.jpg'],
            ['id_vehiculo'=>'3','nombre_vehiculo'=>'Mazda MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','foto'=>'../Imgs/fondoLogin1.jpg'],
            ['id_vehiculo'=>'4','nombre_vehiculo'=>'Mazda MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','foto'=>'../Imgs/fondoLogin1.jpg'],
            ['id_vehiculo'=>'5','nombre_vehiculo'=>'Mazda MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','foto'=>'../Imgs/fondoLogin1.jpg'],
            ['id_vehiculo'=>'6','nombre_vehiculo'=>'Mazda MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','foto'=>'../Imgs/fondoLogin1.jpg'],
            ['id_vehiculo'=>'7','nombre_vehiculo'=>'Mazda MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','foto'=>'../Imgs/fondoLogin1.jpg'],
        ];

    }
}
