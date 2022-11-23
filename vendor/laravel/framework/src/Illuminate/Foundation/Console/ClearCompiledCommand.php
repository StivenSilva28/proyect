<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'clear-compiled')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ClearCompiledCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'clear-compiled';

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
    protected static $defaultName = 'clear-compiled';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the compiled class file';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (is_file($servicesPath = $this->laravel->getCachedServicesPath())) {
            @unlink($servicesPath);
        }

        if (is_file($packagesPath = $this->laravel->getCachedPackagesPath())) {
            @unlink($packagesPath);
        }

<<<<<<< HEAD
        $this->info('Compiled services and packages files removed!');
=======
        $this->components->info('Compiled services and packages files removed successfully.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
