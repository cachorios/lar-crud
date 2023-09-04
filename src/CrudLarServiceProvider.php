<?php

namespace Cachorios\CrudLar;

use Cachorios\CrudLar\Console\InstallCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\RedirectResponse;

class CrudLarServiceProvider extends ServiceProvider
{
    public function register(){

        $this->app->bind('crud-lar', function($app){
            return new Hello();
        });
    }

    public function boot(){
        $this->configureCommands();
//        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
//        $this->loadViewsFrom(__DIR__.'/views', 'crudlar');
//        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
//        $this->publishes([
//            __DIR__.'/views' => resource_path('views/crudlar'),
//        ]);

        RedirectResponse::macro('banner', function ($message) {
            /** @var \Illuminate\Http\RedirectResponse $this */
            return $this->with('flash', [
                'bannerStyle' => 'success',
                'banner' => $message,
            ]);
        });

        RedirectResponse::macro('dangerBanner', function ($message) {
            /** @var \Illuminate\Http\RedirectResponse $this */
            return $this->with('flash', [
                'bannerStyle' => 'danger',
                'banner' => $message,
            ]);
        });

    }

    /**
     * Configure the commands offered by the application.
     *
     * @return void
     */
    protected function configureCommands()
    {


        if ( $this->app->runningInConsole()) {

            $this->commands([
                InstallCommand::class
            ]);

            Artisan::call('crudlar:install');
        }
    }
}