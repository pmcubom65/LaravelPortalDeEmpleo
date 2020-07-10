<?php

namespace App\Providers;
use App\Categoria;
use App\Empresa;
use App\Provincia;
use App\Explaboral;
use App\Contrato;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

     
        View::composer(['editoferta', 'buscarempleo', 'publicaroferta'], function ($view){
            $view->with([
                'provincias'=>Provincia::orderBy('region_name')->get(),
                'experiencias'=>Explaboral::all(),
                'contratos'=>Contrato::all()

                ]);
        });



        View::composer(['home', 'buscarempleo', 'expe'], function ($view){
            $view->with([
                'categorias'=>Categoria::all()

                ]);
        });


        View::composer(['home', 'miempresa'], function ($view){
            $view->with([
                'provincias'=>Provincia::orderBy('region_name')->get(),

                ]);
        });


        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        Validator::extend('image64', function ($attribute, $value, $parameters, $validator) {
            $type = explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
            if (in_array($type, $parameters)) {
                return true;
            }
            return false;
        });
    
        Validator::replacer('image64', function($message, $attribute, $rule, $parameters) {
            return str_replace(':values',join(",",$parameters),$message);
        });
    }
}
