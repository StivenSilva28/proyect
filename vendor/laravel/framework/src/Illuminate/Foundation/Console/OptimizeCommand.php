<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'optimize')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class OptimizeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'optimize';

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
    protected static $defaultName = 'optimize';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache the framework bootstrap files';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        $this->call('config:cache');
        $this->call('route:cache');

        $this->info('Files cached successfully!');
=======
        $this->components->info('Caching the framework bootstrap files');

        collect([
            'config' => fn () => $this->callSilent('config:cache') == 0,
            'routes' => fn () => $this->callSilent('route:cache') == 0,
        ])->each(fn ($task, $description) => $this->components->task($description, $task));

        $this->newLine();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
