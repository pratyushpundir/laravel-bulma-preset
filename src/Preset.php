<?php

namespace PratyushPundir\LaravelBulmaPreset;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Support\Arr;
use File;

class Preset extends LaravelPreset
{
    protected static $command;

    public static function install($command)
    {
        static::$command = $command;

        try {
            static::updatePackages();
            static::updateMix();
            static::updateScripts();
            static::updateStyles();
            static::updateBladeViews();

            $command->info('Scaffolding completed...');
            $command->info('You are ready. Build something awesome!');
        } catch (\Exception $exception) {
            $command->error('Whooops... Something went wrong!!!');
            return $exception;
        }
    }

    /**
     * Updates all NPM Packages.
     *
     * @param $defaultPackages
     * @return array
     */
    public static function updatePackageArray($defaultPackages)
    {
        $additionalPackages = [
            'bulma' => '^0.7.0',
        ];

        $unwantedPackages = [
            'popper.js',
            'lodash'
        ];

        static::$command->info('NPM packages updated: packages.json');

        return array_merge($additionalPackages, Arr::except($defaultPackages, $unwantedPackages));
    }

    /**
     * Update Laravel Mix setup.
     */
    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/js/webpack.mix.js', base_path('webpack.mix.js'));

        static::$command->info('Laravel Mix settings updated: webpack.mix.js');
    }

    /**
     * Update all Javascript scaffolding and set up use of Bulma.
     */
    public static function updateScripts()
    {
        copy(__DIR__ . '/stubs/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));

        static::$command->info('JS Directory: resources/js');
    }

    /**
     * Update all SASS scaffolding and set up use of Bulma.
     */
    public static function updateStyles()
    {
        copy(__DIR__ . '/stubs/sass/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__ . '/stubs/sass/app.scss', resource_path('sass/app.scss'));

        static::$command->info('SASS Directory: resources/sass');
    }

    /**
     * Add Bulma-based Blade Views.
     */
    public static function updateBladeViews()
    {
        if (! File::isDirectory(resource_path('views/bulma'))) {
            File::makeDirectory(resource_path('views/bulma'));
        } else {
            File::cleanDirectory(resource_path('views/bulma'));
        }

        File::makeDirectory(resource_path('views/bulma/layouts'));
        File::makeDirectory(resource_path('views/bulma/shared'));

        copy(__DIR__ . '/stubs/views/layouts/app.blade.php', resource_path('views/bulma/layouts/app.blade.php'));
        copy(__DIR__ . '/stubs/views/shared/bulma-nav.blade.php', resource_path('views/bulma/shared/bulma-nav.blade.php'));
        copy(__DIR__ . '/stubs/views/welcome.blade.php', resource_path('views/bulma/welcome.blade.php'));

        static::$command->info('Blade View Directory: resources/views/bulma');
    }
}
