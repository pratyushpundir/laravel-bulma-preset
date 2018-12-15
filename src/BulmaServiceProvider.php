<?php

namespace PratyushPundir\LaravelBulmaPreset;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class BulmaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('bulma', function () {
            Preset::install();
        });
    }
}
