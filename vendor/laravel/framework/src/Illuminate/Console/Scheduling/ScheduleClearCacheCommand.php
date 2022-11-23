<?php

namespace Illuminate\Console\Scheduling;

use Illuminate\Console\Command;

class ScheduleClearCacheCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'schedule:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the cached mutex files created by scheduler';

    /**
     * Execute the console command.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function handle(Schedule $schedule)
    {
        $mutexCleared = false;

        foreach ($schedule->events($this->laravel) as $event) {
            if ($event->mutex->exists($event)) {
<<<<<<< HEAD
                $this->line('<info>Deleting mutex for:</info> '.$event->command);
=======
                $this->components->info(sprintf('Deleting mutex for [%s]', $event->command));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

                $event->mutex->forget($event);

                $mutexCleared = true;
            }
        }

        if (! $mutexCleared) {
<<<<<<< HEAD
            $this->info('No mutex files were found.');
=======
            $this->components->info('No mutex files were found.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }
}
