<?php

namespace PratyushPundir\LaravelBulmaPreset;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Support\Arr;

class Preset extends LaravelPreset
{
    public static function install($command)
    {
        try {
            static::updatePackages();
            static::updateScripts();
            static::updateScripts();
            static::updateStyles();
            static::updateBladeViews();

            $command->info('Scaffolding completed...');
            $command->info('You are ready to build something awesome!');
        } catch (\Exception $exception) {
            $command->error('Whooops... Something went wrong!!!');
            return $exception;
        }
    }

    public static function updatePackageArray($defaultPackages)
    {

        $additionalPackages = [
            'bulma' => '^0.7.0',
        ];

        $unwantedPackages = [
            'popper.js',
            'jquery',
            'lodash'
        ];

        return array_merge($additionalPackages, Arr::except($defaultPackages, $unwantedPackages));
    }

    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/js/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__ . '/stubs/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));
    }

    public static function updateStyles()
    {
        copy(__DIR__ . '/stubs/sass/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__ . '/stubs/sass/app.scss', resource_path('sass/app.scss'));
    }

    public static function updateBladeViews()
    {
//        File::cleanDirectory(resource_path('views'));
//        File::makeDirectory(resource_path('views/layouts'));
//        File::makeDirectory(resource_path('views/shared'));

        copy(__DIR__ . '/stubs/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
        copy(__DIR__ . '/stubs/views/shared/bulma-nav.blade.php', resource_path('views/shared/bulma-nav.blade.php'));
        copy(__DIR__ . '/stubs/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}
