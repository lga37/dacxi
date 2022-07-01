<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

use App\Models\{Category, Coin, Derivative ,Exchange, History, Index, Platform};

use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    
    
    public function register()
    {
        //
    }

    
    public function boot()
    {
        $models = ['Category','Coin','Derivative' ,'Exchange','History','Index','Platform'];

        $rotas = [];
        foreach($models as $m){
            
            $rotas[$m]=[];

            $model = app("App\\Models\\{$m}");
            $tabela = $model->getTable();
            $tot = 0;
            if (Schema::hasTable($tabela)){
                $tot = $model->count();
                $rotas[$m]=$tot;
            }
        }
        
        View::composer(['components.shared.menu'], function ($view) use ($rotas) {
            $view->with('rotas', $rotas);
        });


        Str::macro('anti_slug', function ($slug) {
            $s2 = preg_replace('/-/', ' ', $slug);
            $s3 = Str::title($s2);
            return $s3;
        });

        

        

    }



}
