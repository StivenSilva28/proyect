<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Symfony\Component\Console\Input\InputOption;

=======
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'make:component')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ComponentMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:component';

    /**
<<<<<<< HEAD
=======
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'make:component';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view component class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Component';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
=======
        if ($this->option('view')) {
            $this->writeView(function () {
                $this->components->info($this->type.' created successfully.');
            });

            return;
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        if (parent::handle() === false && ! $this->option('force')) {
            return false;
        }

        if (! $this->option('inline')) {
            $this->writeView();
        }
    }

    /**
     * Write the view for the component.
     *
<<<<<<< HEAD
     * @return void
     */
    protected function writeView()
=======
     * @param  callable|null  $onSuccess
     * @return void
     */
    protected function writeView($onSuccess = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $path = $this->viewPath(
            str_replace('.', '/', 'components.'.$this->getView()).'.blade.php'
        );

        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        if ($this->files->exists($path) && ! $this->option('force')) {
<<<<<<< HEAD
            $this->error('View already exists!');
=======
            $this->components->error('View already exists.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            return;
        }

        file_put_contents(
            $path,
            '<div>
<<<<<<< HEAD
    <!-- '.Inspiring::quote().' -->
</div>'
        );
=======
    <!-- '.Inspiring::quotes()->random().' -->
</div>'
        );

        if ($onSuccess) {
            $onSuccess();
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        if ($this->option('inline')) {
            return str_replace(
                ['DummyView', '{{ view }}'],
<<<<<<< HEAD
                "<<<'blade'\n<div>\n    <!-- ".Inspiring::quote()." -->\n</div>\nblade",
=======
                "<<<'blade'\n<div>\n    <!-- ".Inspiring::quotes()->random()." -->\n</div>\nblade",
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                parent::buildClass($name)
            );
        }

        return str_replace(
            ['DummyView', '{{ view }}'],
            'view(\'components.'.$this->getView().'\')',
            parent::buildClass($name)
        );
    }

    /**
     * Get the view name relative to the components directory.
     *
     * @return string view
     */
    protected function getView()
    {
        $name = str_replace('\\', '/', $this->argument('name'));

        return collect(explode('/', $name))
            ->map(function ($part) {
                return Str::kebab($part);
            })
            ->implode('.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/view-component.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
                        ? $customPath
                        : __DIR__.$stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\View\Components';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
<<<<<<< HEAD
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the component already exists'],
            ['inline', null, InputOption::VALUE_NONE, 'Create a component that renders an inline view'],
=======
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the component already exists'],
            ['inline', null, InputOption::VALUE_NONE, 'Create a component that renders an inline view'],
            ['view', null, InputOption::VALUE_NONE, 'Create an anonymous component with only a view'],
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        ];
    }
}
