<?php
namespace Gusman\L5Generator;

use Gusman\L5Generator\Commands\CrudMakeCommand;
use Illuminate\Support\ServiceProvider;

class L5GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            CrudMakeCommand::class,
        ]);
    }

}