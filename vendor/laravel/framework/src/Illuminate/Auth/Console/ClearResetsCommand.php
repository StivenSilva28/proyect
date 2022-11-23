<?php

namespace Illuminate\Auth\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'auth:clear-resets')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ClearResetsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:clear-resets {name? : The name of the password broker}';

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
    protected static $defaultName = 'auth:clear-resets';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush expired password reset tokens';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laravel['auth.password']->broker($this->argument('name'))->getRepository()->deleteExpired();

<<<<<<< HEAD
        $this->info('Expired reset tokens cleared!');
=======
        $this->components->info('Expired reset tokens cleared successfully.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
