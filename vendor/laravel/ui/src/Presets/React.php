<?php

namespace Laravel\Ui\Presets;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class React extends Preset
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
        static::updateBootstrapping();
        static::updateComponent();
=======
        static::updateViteConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::addViteReactRefreshDirective();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
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
            '@babel/preset-react' => '^7.13.13',
            'react' => '^17.0.2',
            'react-dom' => '^17.0.2',
        ] + Arr::except($packages, ['vue', 'vue-template-compiler']);
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/react-stubs/webpack.mix.js', base_path('webpack.mix.js'));
=======
            '@vitejs/plugin-react' => '^2.2.0',
            'react' => '^18.2.0',
            'react-dom' => '^18.2.0',
        ] + Arr::except($packages, [
            '@vitejs/plugin-vue',
            'vue'
        ]);
    }

    /**
     * Update the Vite configuration.
     *
     * @return void
     */
    protected static function updateViteConfiguration()
    {
        copy(__DIR__.'/react-stubs/vite.config.js', base_path('vite.config.js'));
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
            resource_path('js/components/ExampleComponent.vue')
        );

        copy(
<<<<<<< HEAD
            __DIR__.'/react-stubs/Example.js',
            resource_path('js/components/Example.js')
=======
            __DIR__.'/react-stubs/Example.jsx',
            resource_path('js/components/Example.jsx')
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/react-stubs/app.js', resource_path('js/app.js'));
    }
<<<<<<< HEAD
=======

    /**
     * Add Vite's React Refresh Runtime
     *
     * @return void
     */
    protected static function addViteReactRefreshDirective()
    {
        $view = static::getViewPath('layouts/app.blade.php');

        if (! file_exists($view)) {
            return;
        }

        file_put_contents(
            $view,
            str_replace('@vite(', '@viteReactRefresh'.PHP_EOL.'    @vite(', file_get_contents($view))
        );
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    protected static function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
