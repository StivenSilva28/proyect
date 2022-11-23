<?php

namespace Illuminate\Bus;

<<<<<<< HEAD
use Illuminate\Container\Container;
=======
use Carbon\CarbonImmutable;
use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\BatchFake;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

trait Batchable
{
    /**
     * The batch ID (if applicable).
     *
     * @var string
     */
    public $batchId;

    /**
<<<<<<< HEAD
=======
     * The fake batch, if applicable.
     *
     * @var \Illuminate\Support\Testing\BatchFake
     */
    private $fakeBatch;

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Get the batch instance for the job, if applicable.
     *
     * @return \Illuminate\Bus\Batch|null
     */
    public function batch()
    {
<<<<<<< HEAD
=======
        if ($this->fakeBatch) {
            return $this->fakeBatch;
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        if ($this->batchId) {
            return Container::getInstance()->make(BatchRepository::class)->find($this->batchId);
        }
    }

    /**
     * Determine if the batch is still active and processing.
     *
     * @return bool
     */
    public function batching()
    {
        $batch = $this->batch();

        return $batch && ! $batch->cancelled();
    }

    /**
     * Set the batch ID on the job.
     *
     * @param  string  $batchId
     * @return $this
     */
    public function withBatchId(string $batchId)
    {
        $this->batchId = $batchId;

        return $this;
    }
<<<<<<< HEAD
=======

    /**
     * Indicate that the job should use a fake batch.
     *
     * @param  string  $id
     * @param  string  $name
     * @param  int  $totalJobs
     * @param  int  $pendingJobs
     * @param  int  $failedJobs
     * @param  array  $failedJobIds
     * @param  array  $options
     * @return array{0: $this, 1: \Illuminate\Support\Testing\BatchFake}
     */
    public function withFakeBatch(string $id = '',
                                  string $name = '',
                                  int $totalJobs = 0,
                                  int $pendingJobs = 0,
                                  int $failedJobs = 0,
                                  array $failedJobIds = [],
                                  array $options = [],
                                  CarbonImmutable $createdAt = null,
                                  ?CarbonImmutable $cancelledAt = null,
                                  ?CarbonImmutable $finishedAt = null)
    {
        $this->fakeBatch = new BatchFake(
            empty($id) ? (string) Str::uuid() : $id,
            $name,
            $totalJobs,
            $pendingJobs,
            $failedJobs,
            $failedJobIds,
            $options,
            $createdAt ?? CarbonImmutable::now(),
            $cancelledAt,
            $finishedAt,
        );

        return [$this, $this->fakeBatch];
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
