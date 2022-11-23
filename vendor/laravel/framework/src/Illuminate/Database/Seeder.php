<?php

namespace Illuminate\Database;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Container\Container;
=======
use Illuminate\Console\View\Components\TwoColumnDetail;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Support\Arr;
use InvalidArgumentException;

abstract class Seeder
{
    /**
     * The container instance.
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * The console command instance.
     *
     * @var \Illuminate\Console\Command
     */
    protected $command;

    /**
<<<<<<< HEAD
=======
     * Seeders that have been called at least one time.
     *
     * @var array
     */
    protected static $called = [];

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Run the given seeder class.
     *
     * @param  array|string  $class
     * @param  bool  $silent
     * @param  array  $parameters
     * @return $this
     */
    public function call($class, $silent = false, array $parameters = [])
    {
        $classes = Arr::wrap($class);

        foreach ($classes as $class) {
            $seeder = $this->resolve($class);

            $name = get_class($seeder);

            if ($silent === false && isset($this->command)) {
<<<<<<< HEAD
                $this->command->getOutput()->writeln("<comment>Seeding:</comment> {$name}");
=======
                with(new TwoColumnDetail($this->command->getOutput()))->render(
                    $name,
                    '<fg=yellow;options=bold>RUNNING</>'
                );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }

            $startTime = microtime(true);

            $seeder->__invoke($parameters);

<<<<<<< HEAD
            $runTime = number_format((microtime(true) - $startTime) * 1000, 2);

            if ($silent === false && isset($this->command)) {
                $this->command->getOutput()->writeln("<info>Seeded:</info>  {$name} ({$runTime}ms)");
            }
=======
            if ($silent === false && isset($this->command)) {
                $runTime = number_format((microtime(true) - $startTime) * 1000, 2);

                with(new TwoColumnDetail($this->command->getOutput()))->render(
                    $name,
                    "<fg=gray>$runTime ms</> <fg=green;options=bold>DONE</>"
                );

                $this->command->getOutput()->writeln('');
            }

            static::$called[] = $class;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        return $this;
    }

    /**
     * Run the given seeder class.
     *
     * @param  array|string  $class
     * @param  array  $parameters
     * @return void
     */
    public function callWith($class, array $parameters = [])
    {
        $this->call($class, false, $parameters);
    }

    /**
     * Silently run the given seeder class.
     *
     * @param  array|string  $class
     * @param  array  $parameters
     * @return void
     */
    public function callSilent($class, array $parameters = [])
    {
        $this->call($class, true, $parameters);
    }

    /**
<<<<<<< HEAD
=======
     * Run the given seeder class once.
     *
     * @param  array|string  $class
     * @param  bool  $silent
     * @return void
     */
    public function callOnce($class, $silent = false, array $parameters = [])
    {
        if (in_array($class, static::$called)) {
            return;
        }

        $this->call($class, $silent, $parameters);
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Resolve an instance of the given seeder class.
     *
     * @param  string  $class
     * @return \Illuminate\Database\Seeder
     */
    protected function resolve($class)
    {
        if (isset($this->container)) {
            $instance = $this->container->make($class);

            $instance->setContainer($this->container);
        } else {
            $instance = new $class;
        }

        if (isset($this->command)) {
            $instance->setCommand($this->command);
        }

        return $instance;
    }

    /**
     * Set the IoC container instance.
     *
     * @param  \Illuminate\Container\Container  $container
     * @return $this
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Set the console command instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @return $this
     */
    public function setCommand(Command $command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Run the database seeds.
     *
     * @param  array  $parameters
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function __invoke(array $parameters = [])
    {
        if (! method_exists($this, 'run')) {
            throw new InvalidArgumentException('Method [run] missing from '.get_class($this));
        }

<<<<<<< HEAD
        return isset($this->container)
                    ? $this->container->call([$this, 'run'], $parameters)
                    : $this->run(...$parameters);
=======
        $callback = fn () => isset($this->container)
            ? $this->container->call([$this, 'run'], $parameters)
            : $this->run(...$parameters);

        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[WithoutModelEvents::class])) {
            $callback = $this->withoutModelEvents($callback);
        }

        return $callback();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
