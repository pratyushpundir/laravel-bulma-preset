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
        // Register the Bulma preset macro
        PresetCommand::macro('bulma', function ($command) {
            Preset::install($command);
        });
    }
}
