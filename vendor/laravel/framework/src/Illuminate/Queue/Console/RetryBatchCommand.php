<?php

namespace Illuminate\Queue\Console;

use Illuminate\Bus\BatchRepository;
use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'queue:retry-batch')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class RetryBatchCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'queue:retry-batch {id : The ID of the batch whose failed jobs should be retried}';

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
    protected static $defaultName = 'queue:retry-batch';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retry the failed jobs for a batch';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        $batch = $this->laravel[BatchRepository::class]->find($id = $this->argument('id'));

        if (! $batch) {
<<<<<<< HEAD
            $this->error("Unable to find a batch with ID [{$id}].");

            return 1;
        } elseif (empty($batch->failedJobIds)) {
            $this->error('The given batch does not contain any failed jobs.');
=======
            $this->components->error("Unable to find a batch with ID [{$id}].");

            return 1;
        } elseif (empty($batch->failedJobIds)) {
            $this->components->error('The given batch does not contain any failed jobs.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            return 1;
        }

<<<<<<< HEAD
        foreach ($batch->failedJobIds as $failedJobId) {
            $this->call('queue:retry', ['id' => $failedJobId]);
        }
=======
        $this->components->info("Pushing failed queue jobs of the batch [$id] back onto the queue.");

        foreach ($batch->failedJobIds as $failedJobId) {
            $this->components->task($failedJobId, fn () => $this->callSilent('queue:retry', ['id' => $failedJobId]) == 0);
        }

        $this->newLine();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
