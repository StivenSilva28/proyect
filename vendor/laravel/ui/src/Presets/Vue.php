<?php

namespace Laravel\Ui\Presets;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class Vue extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
<<<<<<< HEAD
        static::updateWebpackConfiguration();
=======
        static::updateViteConfiguration();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        static::updateBootstrapping();
        static::updateComponent();
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
            'resolve-url-loader' => '^3.1.2',
            'sass' => '^1.32.11',
            'sass-loader' => '^11.0.1',
            'vue' => '^2.6.12',
            'vue-template-compiler' => '^2.6.12',
        ] + Arr::except($packages, [
            '@babel/preset-react',
=======
            '@vitejs/plugin-vue' => '^3.0.1',
            'vue' => '^3.2.37',
        ] + Arr::except($packages, [
            '@vitejs/plugin-react',
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            'react',
            'react-dom',
        ]);
    }

    /**
<<<<<<< HEAD
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/vue-stubs/webpack.mix.js', base_path('webpack.mix.js'));
=======
     * Update the Vite configuration.
     *
     * @return void
     */
    protected static function updateViteConfiguration()
    {
        copy(__DIR__.'/vue-stubs/vite.config.js', base_path('vite.config.js'));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/Example.js')
        );

        copy(
            __DIR__.'/vue-stubs/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/vue-stubs/app.js', resource_path('js/app.js'));
    }
}
