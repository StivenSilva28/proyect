<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'env')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class EnvironmentCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'env';

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
    protected static $defaultName = 'env';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the current framework environment';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        $this->line('<info>Current application environment:</info> <comment>'.$this->laravel['env'].'</comment>');
=======
        $this->components->info(sprintf(
            'The application environment is [%s].',
            $this->laravel['env'],
        ));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
