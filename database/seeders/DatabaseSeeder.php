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
        $tablas=['tipo_vehiculo','vehiculos','usuarios','roles'];
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
        $vehiculos=[
            ['id_vehiculo'=>1,'nombre_vehiculo'=>'MX-5','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','year'=>2016,'foto'=>'mx-5.jpg'],
            ['id_vehiculo'=>2,'nombre_vehiculo'=>'Ranger 2019','marca'=>'Ford','nombre_tipo'=>
                'Camioneta','estado'=>'disponible','patente'=>'BB-CL-35','year'=>2019,'foto'=>'ranger.jpg'],
            ['id_vehiculo'=>3,'nombre_vehiculo'=>'Tercel','marca'=>'Toyota','nombre_tipo'=>
                'Sedan','estado'=>'disponible','patente'=>'BB-CL-36','year'=>1998,'foto'=>'tercel.jpg'],
            ['id_vehiculo'=>4,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'fondoLogin1.jpg'],
            ['id_vehiculo'=>5,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'fondoLogin1.jpg'],
            ['id_vehiculo'=>6,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'fondoLogin1.jpg'],
            ['id_vehiculo'=>7,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'fondoLogin1.jpg'],
        ];
        foreach($vehiculos as $vehiculo){
            DB::table('vehiculos')->insert([
                'id_vehiculo' => $vehiculo['id_vehiculo'],
                'nombre_vehiculo'=> $vehiculo['nombre_vehiculo'],
                'marca'=> $vehiculo['marca'],
                'nombre_tipo'=> $vehiculo['nombre_tipo'],
                'estado'=> $vehiculo['estado'],
                'patente'=> $vehiculo['patente'],
                'year'=> $vehiculo['year'],
                'foto'=> $vehiculo['foto'],
                'created_At' => new DateTime('NOW')
            ]);           
        }
        //USUARIOS
        $roles=[
            ['id'=>1,'nombre'=>'Administrador'],
            ['id'=>8,'nombre'=>'Ejecutivo'],
        ];
        foreach($roles as $rol){
            DB::table('roles')->insert([
                'id' => $rol['id'],
                'nombre' => $rol['nombre'],
                'created_at' => new DateTime('NOW'),
                'updated_at' => NULL
            ]);           
        }
        $usuarios=[
            ['id'=>2,'nombre'=>'Renato Plaza','password'=>'$2y$10$Lj3spqVFDDvtpk..JBsQT.aqB5ZfBcDWf/G3S48eW484kkmIilU9S',
                'rol_id'=>1,'email'=>'renato@gmail.com','created_At' => new DateTime('NOW')],
            ['id'=>1,'nombre'=>'Carlos Alten','password'=>'$2y$10$08ttoKi2SpZkRmDFYC2kEOzVtVaJBX0E4eg3Y.295csobyUdkuRIy',
                'rol_id'=>8,'email'=>'carlosalt@gmail.com','created_At' => new DateTime('NOW')],
            ['id'=>3,'nombre'=>'Cristobal Herrera','password'=>'$2y$10$/Ob7ZYsEv9URBlcYUGO0VOcsTsg.qZ2ZC9ztxSYv4/a5iMWLdnhCm',
                'rol_id'=>1,'email'=>'cristobalh@gmail.com','created_At' => new DateTime('NOW')],
        ];
        foreach($usuarios as $usuario){
            DB::table('usuarios')->insert([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'password' => $usuario['password'],
                'rol_id' => $usuario['rol_id'],
                'email' => $usuario['email'],
                'created_At' => new DateTime('NOW')
            ]);           
        }
    }
}
