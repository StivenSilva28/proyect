<?php

namespace Illuminate\Foundation\Console;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Foundation\Events\MaintenanceModeDisabled;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'up')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class UpCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'up';

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
    protected static $defaultName = 'up';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bring the application out of maintenance mode';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
<<<<<<< HEAD
            if (! is_file(storage_path('framework/down'))) {
                $this->comment('Application is already up.');
=======
            if (! $this->laravel->maintenanceMode()->active()) {
                $this->components->info('Application is already up.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

                return 0;
            }

<<<<<<< HEAD
            unlink(storage_path('framework/down'));
=======
            $this->laravel->maintenanceMode()->deactivate();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            if (is_file(storage_path('framework/maintenance.php'))) {
                unlink(storage_path('framework/maintenance.php'));
            }

<<<<<<< HEAD
            $this->laravel->get('events')->dispatch(MaintenanceModeDisabled::class);

            $this->info('Application is now live.');
        } catch (Exception $e) {
            $this->error('Failed to disable maintenance mode.');

            $this->error($e->getMessage());

            return 1;
        }
=======
            $this->laravel->get('events')->dispatch(new MaintenanceModeDisabled());

            $this->components->info('Application is now live.');
        } catch (Exception $e) {
            $this->components->error(sprintf(
                'Failed to disable maintenance mode: %s.',
                $e->getMessage(),
            ));

            return 1;
        }

        return 0;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
