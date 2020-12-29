<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gates
        Gate::define('onlyAdmin', function($usuario){
            return $usuario->rol->nombre == 'Administrador';
        });
        Gate::define('bothRols', function($usuario){
            return $usuario->rol->nombre == 'Administrador' || $usuario->rol->nombre == 'Ejecutivo';
        });
        Gate::define('noMakeArriendo', function($usuario){
            $confirmado='ok';
            foreach($usuario->arriendos as $arriendo){
                if($arriendo->confirmada == 0){
                    $confirmado='one';
                }
                
            }
            return $confirmado=='ok';
        });
    }
}
