<?php

namespace Illuminate\Queue\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'queue:forget')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ForgetFailedCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'queue:forget {id : The ID of the failed job}';

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
    protected static $defaultName = 'queue:forget';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a failed queue job';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->laravel['queue.failer']->forget($this->argument('id'))) {
<<<<<<< HEAD
            $this->info('Failed job deleted successfully!');
        } else {
            $this->error('No failed job matches the given ID.');
=======
            $this->components->info('Failed job deleted successfully.');
        } else {
            $this->components->error('No failed job matches the given ID.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }
}
