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


        View::composer(['welcome', 'home', 'home2'], function ($view){
            $view->with([
                'categorias'=>Categoria::all(),
                'empresas'=>Empresa::all(),
                ]);
        });



        View::composer(['welcome', 'home', 'home2'], function ($view){
            $view->with([
                'provincias'=>Provincia::all(),
                'experiencias'=>Explaboral::all(),
                'contratos'=>Contrato::all()


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
    }
}
