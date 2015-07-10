<?php

namespace Faelzanin\Translatelang;

use Illuminate\Support\ServiceProvider;

class TranslateLangProvider extends ServiceProvider
{
    protected $commands = [
        'Faelzanin\Translatelang\Console\Commands\TranslateLangCommand'
    ];

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
        $this->commands($this->commands);
    }
}
