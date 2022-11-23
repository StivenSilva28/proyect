<?php

namespace Illuminate\Console\Scheduling;

<<<<<<< HEAD
use Illuminate\Console\Command;

=======
use Illuminate\Console\Application;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'schedule:test')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ScheduleTestCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $name = 'schedule:test';
=======
    protected $signature = 'schedule:test {--name= : The name of the scheduled command to run}';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'schedule:test';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a scheduled command';

    /**
     * Execute the console command.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function handle(Schedule $schedule)
    {
<<<<<<< HEAD
=======
        $phpBinary = Application::phpBinary();

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $commands = $schedule->events();

        $commandNames = [];

        foreach ($commands as $command) {
            $commandNames[] = $command->command ?? $command->getSummaryForDisplay();
        }

<<<<<<< HEAD
        $index = array_search($this->choice('Which command would you like to run?', $commandNames), $commandNames);

        $event = $commands[$index];

        $this->line('<info>['.date('c').'] Running scheduled command:</info> '.$event->getSummaryForDisplay());

        $event->run($this->laravel);
=======
        if (empty($commandNames)) {
            return $this->components->info('No scheduled commands have been defined.');
        }

        if (! empty($name = $this->option('name'))) {
            $commandBinary = $phpBinary.' '.Application::artisanBinary();

            $matches = array_filter($commandNames, function ($commandName) use ($commandBinary, $name) {
                return trim(str_replace($commandBinary, '', $commandName)) === $name;
            });

            if (count($matches) !== 1) {
                $this->components->info('No matching scheduled command found.');

                return;
            }

            $index = key($matches);
        } else {
            $index = array_search($this->components->choice('Which command would you like to run?', $commandNames), $commandNames);
        }

        $event = $commands[$index];

        $summary = $event->getSummaryForDisplay();

        $command = $event instanceof CallbackEvent
            ? $summary
            : trim(str_replace($phpBinary, '', $event->command));

        $description = sprintf(
            'Running [%s]%s',
            $command,
            $event->runInBackground ? ' in background' : '',
        );

        $this->components->task($description, fn () => $event->run($this->laravel));

        if (! $event instanceof CallbackEvent) {
            $this->components->bulletList([$event->getSummaryForDisplay()]);
        }

        $this->newLine();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
