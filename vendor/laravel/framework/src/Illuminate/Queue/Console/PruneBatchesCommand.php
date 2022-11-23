<?php

namespace Illuminate\Queue\Console;

<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Bus\BatchRepository;
use Illuminate\Bus\DatabaseBatchRepository;
use Illuminate\Bus\PrunableBatchRepository;
use Illuminate\Console\Command;
<<<<<<< HEAD

=======
use Illuminate\Support\Carbon;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'queue:prune-batches')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class PruneBatchesCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'queue:prune-batches
                {--hours=24 : The number of hours to retain batch data}
                {--unfinished= : The number of hours to retain unfinished batch data }';

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
    protected static $defaultName = 'queue:prune-batches';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prune stale entries from the batches database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $repository = $this->laravel[BatchRepository::class];

        $count = 0;

        if ($repository instanceof PrunableBatchRepository) {
            $count = $repository->prune(Carbon::now()->subHours($this->option('hours')));
        }

<<<<<<< HEAD
        $this->info("{$count} entries deleted!");

        if ($unfinished = $this->option('unfinished')) {
=======
        $this->components->info("{$count} entries deleted.");

        if ($this->option('unfinished')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $count = 0;

            if ($repository instanceof DatabaseBatchRepository) {
                $count = $repository->pruneUnfinished(Carbon::now()->subHours($this->option('unfinished')));
            }

<<<<<<< HEAD
            $this->info("{$count} unfinished entries deleted!");
=======
            $this->components->info("{$count} unfinished entries deleted.");
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }
}
