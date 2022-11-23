<?php

namespace Illuminate\Support\Testing\Fakes;

use Carbon\CarbonImmutable;
use Closure;
<<<<<<< HEAD
use Illuminate\Bus\Batch;
use Illuminate\Bus\BatchRepository;
use Illuminate\Bus\PendingBatch;
use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Support\Facades\Facade;
=======
use Illuminate\Bus\BatchRepository;
use Illuminate\Bus\PendingBatch;
use Illuminate\Bus\UpdatedBatchJobCounts;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Support\Str;

class BatchRepositoryFake implements BatchRepository
{
    /**
<<<<<<< HEAD
=======
     * The batches stored in the repository.
     *
     * @var \Illuminate\Bus\Batch[]
     */
    protected $batches = [];

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Retrieve a list of batches.
     *
     * @param  int  $limit
     * @param  mixed  $before
     * @return \Illuminate\Bus\Batch[]
     */
    public function get($limit, $before)
    {
<<<<<<< HEAD
        return [];
=======
        return $this->batches;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Retrieve information about an existing batch.
     *
     * @param  string  $batchId
     * @return \Illuminate\Bus\Batch|null
     */
    public function find(string $batchId)
    {
<<<<<<< HEAD
        //
=======
        return $this->batches[$batchId] ?? null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Store a new pending batch.
     *
     * @param  \Illuminate\Bus\PendingBatch  $batch
     * @return \Illuminate\Bus\Batch
     */
    public function store(PendingBatch $batch)
    {
<<<<<<< HEAD
        return new Batch(
            new QueueFake(Facade::getFacadeApplication()),
            $this,
            (string) Str::orderedUuid(),
=======
        $id = (string) Str::orderedUuid();

        $this->batches[$id] = new BatchFake(
            $id,
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $batch->name,
            count($batch->jobs),
            count($batch->jobs),
            0,
            [],
            $batch->options,
            CarbonImmutable::now(),
            null,
            null
        );
<<<<<<< HEAD
=======

        return $this->batches[$id];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Increment the total number of jobs within the batch.
     *
     * @param  string  $batchId
     * @param  int  $amount
     * @return void
     */
    public function incrementTotalJobs(string $batchId, int $amount)
    {
        //
    }

    /**
     * Decrement the total number of pending jobs for the batch.
     *
     * @param  string  $batchId
     * @param  string  $jobId
     * @return \Illuminate\Bus\UpdatedBatchJobCounts
     */
    public function decrementPendingJobs(string $batchId, string $jobId)
    {
        return new UpdatedBatchJobCounts;
    }

    /**
     * Increment the total number of failed jobs for the batch.
     *
     * @param  string  $batchId
     * @param  string  $jobId
     * @return \Illuminate\Bus\UpdatedBatchJobCounts
     */
    public function incrementFailedJobs(string $batchId, string $jobId)
    {
        return new UpdatedBatchJobCounts;
    }

    /**
     * Mark the batch that has the given ID as finished.
     *
     * @param  string  $batchId
     * @return void
     */
    public function markAsFinished(string $batchId)
    {
<<<<<<< HEAD
        //
=======
        if (isset($this->batches[$batchId])) {
            $this->batches[$batchId]->finishedAt = now();
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Cancel the batch that has the given ID.
     *
     * @param  string  $batchId
     * @return void
     */
    public function cancel(string $batchId)
    {
<<<<<<< HEAD
        //
=======
        if (isset($this->batches[$batchId])) {
            $this->batches[$batchId]->cancel();
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Delete the batch that has the given ID.
     *
     * @param  string  $batchId
     * @return void
     */
    public function delete(string $batchId)
    {
<<<<<<< HEAD
        //
=======
        unset($this->batches[$batchId]);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Execute the given Closure within a storage specific transaction.
     *
     * @param  \Closure  $callback
     * @return mixed
     */
    public function transaction(Closure $callback)
    {
        return $callback();
    }
}
