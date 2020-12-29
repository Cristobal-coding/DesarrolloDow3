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
        $tablas=['tipo_vehiculo','vehiculos','usuarios','roles','clientes'];
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
                'created_at' => new DateTime('NOW'),
                'updated_at' => NULL
            ]);           
        }
        //Vehiculos
        $vehiculos=[
            ['id'=>1,'nombre_vehiculo'=>'MX-5','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'BB-CL-34','year'=>2016,'foto'=>'public/Vehiculos/mx-5.jpg'],
            ['id'=>2,'nombre_vehiculo'=>'Ranger','marca'=>'Ford','nombre_tipo'=>
                'Camioneta','estado'=>'Disponible','patente'=>'BB-CL-35','year'=>2019,'foto'=>'public/Vehiculos/ranger.jpg'],
            ['id'=>3,'nombre_vehiculo'=>'Tercel','marca'=>'Toyota','nombre_tipo'=>
                'Sedan','estado'=>'Disponible','patente'=>'BB-CL-36','year'=>1998,'foto'=>'public/Vehiculos/tercel.jpg'],
            ['id'=>4,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'public/Vehiculos/fondoLogin1.jpg'],
            ['id'=>5,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'public/Vehiculos/fondoLogin1.jpg'],
            ['id'=>6,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'public/Vehiculos/fondoLogin1.jpg'],
            ['id'=>7,'nombre_vehiculo'=>'MX-7','marca'=>'Mazda','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'BB-CL-34','year'=>2019,'foto'=>'public/Vehiculos/fondoLogin1.jpg'],
        ];
        foreach($vehiculos as $vehiculo){
            DB::table('vehiculos')->insert([
                'id' => $vehiculo['id'],
                'nombre_vehiculo'=> $vehiculo['nombre_vehiculo'],
                'marca'=> $vehiculo['marca'],
                'nombre_tipo'=> $vehiculo['nombre_tipo'],
                'estado'=> $vehiculo['estado'],
                'patente'=> $vehiculo['patente'],
                'year'=> $vehiculo['year'],
                'foto'=> $vehiculo['foto'],
                'created_at' => new DateTime('NOW'),
                'updated_at' => new DateTime('NOW'),
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
            ///Las tres contraseñas son '12345'
            ['id'=>2,'nombre'=>'Renato Plaza','password'=>'$2y$10$Jrx8m.mXR5Tk5GxTMmq6peuKsWB.ReqcHM/yuPqExMxd2hFiA1wAi',
                'rol_id'=>1,'email'=>'renato@gmail.com',],
            ['id'=>1,'nombre'=>'Carlos Alten','password'=>'$2y$10$sUkguMKL/reYpC85.2FmmeW26b6ujY4umywnKGnPCkGTXpnSUPOum',
                'rol_id'=>8,'email'=>'carlosalt@gmail.com',],
            ['id'=>3,'nombre'=>'Cristobal Herrera','password'=>'$2y$10$UhPOv0HEoAzCCS5bA7H1yO6ZSiyPeZOXf6s.8QnJ2CT5bvh8kDRRO',
                'rol_id'=>1,'email'=>'cristobalh@gmail.com',],
        ];
        foreach($usuarios as $usuario){
            DB::table('usuarios')->insert([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'password' => $usuario['password'],
                'rol_id' => $usuario['rol_id'],
                'email' => $usuario['email'],
                'created_at' => new DateTime('NOW'),
                'updated_at' => NULL
            ]);           
        }
        // //Clientes
        $clientes=[
            ['rut_cliente'=>'20.482.871-7','nombre_cliente'=>'Renato Plaza','fono_cliente'=>'78590098'],
            ['rut_cliente'=>'20.440.649-9','nombre_cliente'=>'Cristobal Herrera','fono_cliente'=>'98390098']         
        ];
        foreach($clientes as $cliente){
            DB::table('clientes')->insert([
                'rut_cliente' => $cliente['rut_cliente'],
                'nombre_cliente' => $cliente['nombre_cliente'],
                'fono_cliente' => $cliente['fono_cliente'],
                'created_at' => new DateTime('NOW'),
                'updated_at' => NULL
            ]);           
        }

        // //Sucursales
        $sucursales=[
            ['id'=>'1','nombre'=>'Autos Viña','region'=>'Valparaiso'],
            ['id'=>'2','nombre'=>'Autos Santiago','region'=>'Santiago'],                  
     
        ];
        foreach($sucursales as $sucursal){
            DB::table('sucursales')->insert([
                'id' => $sucursal['id'],
                'nombre' => $sucursal['nombre'],
                'region' => $sucursal['region'],
                'created_at' => new DateTime('NOW'),
                'updated_at' => NULL
            ]);           
        }

    }
}
