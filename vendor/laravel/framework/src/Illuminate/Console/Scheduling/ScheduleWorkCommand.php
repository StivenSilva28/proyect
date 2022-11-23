<?php

namespace Illuminate\Console\Scheduling;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Symfony\Component\Process\Process;

=======
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Process\Process;

#[AsCommand(name: 'schedule:work')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ScheduleWorkCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'schedule:work';

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
    protected static $defaultName = 'schedule:work';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the schedule worker';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        $this->info('Schedule worker started successfully.');
=======
        $this->components->info('Running schedule tasks every minute.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        [$lastExecutionStartedAt, $keyOfLastExecutionWithOutput, $executions] = [null, null, []];

        while (true) {
            usleep(100 * 1000);

            if (Carbon::now()->second === 0 &&
                ! Carbon::now()->startOfMinute()->equalTo($lastExecutionStartedAt)) {
                $executions[] = $execution = new Process([
                    PHP_BINARY,
                    defined('ARTISAN_BINARY') ? ARTISAN_BINARY : 'artisan',
                    'schedule:run',
                ]);

                $execution->start();

                $lastExecutionStartedAt = Carbon::now()->startOfMinute();
            }

            foreach ($executions as $key => $execution) {
<<<<<<< HEAD
                $output = trim($execution->getIncrementalOutput()).
                          trim($execution->getIncrementalErrorOutput());

                if (! empty($output)) {
                    if ($key !== $keyOfLastExecutionWithOutput) {
                        $this->info(PHP_EOL.'['.date('c').'] Execution #'.($key + 1).' output:');

                        $keyOfLastExecutionWithOutput = $key;
                    }

                    $this->output->writeln($output);
                }
=======
                $output = $execution->getIncrementalOutput().
                          $execution->getIncrementalErrorOutput();

                $this->output->write(ltrim($output, "\n"));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

                if (! $execution->isRunning()) {
                    unset($executions[$key]);
                }
            }
        }
    }
}
