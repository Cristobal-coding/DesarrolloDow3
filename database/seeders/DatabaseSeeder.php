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
        $tablas=['tipo_vehiculo','vehiculos','usuarios','roles','clientes','sucursales','arriendos','arriendo_vehiculo'];
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
            ['nombre_tipo'=>'Deportivo','valor_diario'=>70000],
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
                'Sedan','estado'=>'Disponible','patente'=>'BQ-BG-36','year'=>1998,'foto'=>'public/Vehiculos/tercel.jpg'],
            ['id'=>4,'nombre_vehiculo'=>'Panamera','marca'=>'Porsche','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'HJ-KJ-34','year'=>2021,'foto'=>'public/Vehiculos/Panamera.jpg'],
            ['id'=>5,'nombre_vehiculo'=>'Panamera Turbo','marca'=>'Porsche','nombre_tipo'=>
                'Deportivo','estado'=>'Disponible','patente'=>'AA-DF-34','year'=>2020,'foto'=>'public/Vehiculos/Panamera_Turbo.jpg'],
            ['id'=>6,'nombre_vehiculo'=>'Hilux','marca'=>'Toyota','nombre_tipo'=>
                'Camioneta','estado'=>'Disponible','patente'=>'AA-FD-45','year'=>2018,'foto'=>'public/Vehiculos/Hilux.jpg'],
            ['id'=>7,'nombre_vehiculo'=>'R8','marca'=>'Mazda','nombre_tipo'=>
                'Deportivo','estado'=>'Disponible','patente'=>'ZZ-KL-34','year'=>2019,'foto'=>'public/Vehiculos/R8.jpg'],
            ['id'=>8,'nombre_vehiculo'=>'S5 Sportback','marca'=>'Audi','nombre_tipo'=>
                'Sedan','estado'=>'Disponible','patente'=>'ZH-MN-34','year'=>2019,'foto'=>'public/Vehiculos/S5.jpg'],
            ['id'=>9,'nombre_vehiculo'=>'Camaro SS','marca'=>'Chevrolet','nombre_tipo'=>
                'Deportivo','estado'=>'Disponible','patente'=>'FG-JH-34','year'=>2013,'foto'=>'public/Vehiculos/CamaroSS.jpg'],
            ['id'=>10,'nombre_vehiculo'=>'Testarossa','marca'=>'Ferrari','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'WW-DE-34','year'=>2000,'foto'=>'public/Vehiculos/testarossa.jpg'],
            ['id'=>11,'nombre_vehiculo'=>'Mustang','marca'=>'Ford','nombre_tipo'=>
                'Deportivo','estado'=>'Disponible','patente'=>'AS-FD-30','year'=>2018,'foto'=>'public/Vehiculos/mustang.jpg'],
            ['id'=>12,'nombre_vehiculo'=>'GT','marca'=>'Ford','nombre_tipo'=>
                'Deportivo','estado'=>'Disponible','patente'=>'FG-AS-23','year'=>2017,'foto'=>'public/Vehiculos/GT.jpg'],
            ['id'=>13,'nombre_vehiculo'=>'Civic','marca'=>'Honda','nombre_tipo'=>
                'Sedan','estado'=>'Disponible','patente'=>'ER-SD-22','year'=>2018,'foto'=>'public/Vehiculos/Civic.jpg'],
            ['id'=>14,'nombre_vehiculo'=>'Mucielago SV','marca'=>'Lamborghini','nombre_tipo'=>
                'Deportivo','estado'=>'Disponible','patente'=>'ED-AS-14','year'=>2017,'foto'=>'public/Vehiculos/Lambo.jpg'],
            ['id'=>15,'nombre_vehiculo'=>'Mercury','marca'=>'Cougar','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'ZZ-AS-12','year'=>1970,'foto'=>'public/Vehiculos/Mercury.jpg'],
            ['id'=>16,'nombre_vehiculo'=>'350Z','marca'=>'Nissan','nombre_tipo'=>
                'Coupe','estado'=>'Disponible','patente'=>'AS-CV-12','year'=>2016,'foto'=>'public/Vehiculos/350.jpg'],

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
            ///Todas las  contraseñas son '12345'
            ['id'=>2,'nombre'=>'Renato Plaza','password'=>'$2y$10$Jrx8m.mXR5Tk5GxTMmq6peuKsWB.ReqcHM/yuPqExMxd2hFiA1wAi',
                'rol_id'=>1,'email'=>'renato@gmail.com',],
            ['id'=>1,'nombre'=>'Carlos Alten','password'=>'$2y$10$sUkguMKL/reYpC85.2FmmeW26b6ujY4umywnKGnPCkGTXpnSUPOum',
                'rol_id'=>8,'email'=>'carlosalt@gmail.com',],
            ['id'=>3,'nombre'=>'Cristobal Herrera','password'=>'$2y$10$UhPOv0HEoAzCCS5bA7H1yO6ZSiyPeZOXf6s.8QnJ2CT5bvh8kDRRO',
                'rol_id'=>1,'email'=>'cristobalh@gmail.com',],
            ['id'=>4,'nombre'=>'Franco Mangene','password'=>'$2y$10$Cu5QjHaRt8bSlPRFylXmdudTWawgKR6LpfKKF65A1/R5AlzvHcRBq',
                'rol_id'=>1,'email'=>'francom@gmail.com',],
            ['id'=>5,'nombre'=>'Esteban Gonzalez','password'=>'$2y$10$36366rbMVUBLzuBNMo60u.6wrMExYpuGj4UoTKJC3CLIw7Gd3aG4K',
                'rol_id'=>8,'email'=>'estebang@gmail.com',],
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
            ['rut_cliente'=>'20482871-7','nombre_cliente'=>'Renato Plaza','fono_cliente'=>'78590098'],
            ['rut_cliente'=>'20421831-5','nombre_cliente'=>'Bob Ross','fono_cliente'=>'05263985'],
            ['rut_cliente'=>'14253561-7','nombre_cliente'=>'Sylvia Costa','fono_cliente'=>'58260023'],
            ['rut_cliente'=>'11482871-7','nombre_cliente'=>'Cristobal Herrera','fono_cliente'=>'78945651'],
            ['rut_cliente'=>'10256572-7','nombre_cliente'=>'Oscar Buff','fono_cliente'=>'23541156'],
            ['rut_cliente'=>'21452871-7','nombre_cliente'=>'Elwynn Troncoso','fono_cliente'=>'95869956'],
            ['rut_cliente'=>'14485786-7','nombre_cliente'=>'Mario Gann','fono_cliente'=>'789566889'],
            ['rut_cliente'=>'11482871-7','nombre_cliente'=>'Jose Marco','fono_cliente'=>'568922444'],
            ['rut_cliente'=>'18440649-9','nombre_cliente'=>'Catalina Herrera','fono_cliente'=>'78452269']         
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
            ['id'=>'3','nombre'=>'Autos Concepcion','region'=>'Bio-Bio'],
            ['id'=>'4','nombre'=>'Autos Coquimbo','region'=>'Santiago'],           
     
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
