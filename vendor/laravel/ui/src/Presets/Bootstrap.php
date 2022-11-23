<?php

namespace Laravel\Ui\Presets;

use Illuminate\Filesystem\Filesystem;

class Bootstrap extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
<<<<<<< HEAD
        static::updateWebpackConfiguration();
=======
        static::updateViteConfiguration();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        static::updateSass();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
<<<<<<< HEAD
            'bootstrap' => '^5.1.3',
            '@popperjs/core' => '^2.10.2',
            'sass' => '^1.32.11',
            'sass-loader' => '^11.0.1',
=======
            'bootstrap' => '^5.2.1',
            '@popperjs/core' => '^2.10.2',
            'sass' => '^1.32.11',
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        ] + $packages;
    }

    /**
<<<<<<< HEAD
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/bootstrap-stubs/webpack.mix.js', base_path('webpack.mix.js'));
=======
     * Update the Vite configuration.
     *
     * @return void
     */
    protected static function updateViteConfiguration()
    {
        copy(__DIR__.'/bootstrap-stubs/vite.config.js', base_path('vite.config.js'));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));

        copy(__DIR__.'/bootstrap-stubs/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__.'/bootstrap-stubs/app.scss', resource_path('sass/app.scss'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/bootstrap-stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }
}
