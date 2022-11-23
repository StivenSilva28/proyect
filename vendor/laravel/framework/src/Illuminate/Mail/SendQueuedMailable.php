<?php

namespace Illuminate\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Factory as MailFactory;
use Illuminate\Contracts\Mail\Mailable as MailableContract;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
<<<<<<< HEAD

class SendQueuedMailable
{
    use Queueable;
=======
use Illuminate\Queue\InteractsWithQueue;

class SendQueuedMailable
{
    use Queueable, InteractsWithQueue;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * The mailable message instance.
     *
     * @var \Illuminate\Contracts\Mail\Mailable
     */
    public $mailable;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout;

    /**
<<<<<<< HEAD
=======
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @return int|null
     */
    public $maxExceptions;

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Indicates if the job should be encrypted.
     *
     * @var bool
     */
    public $shouldBeEncrypted = false;

    /**
     * Create a new job instance.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable
     * @return void
     */
    public function __construct(MailableContract $mailable)
    {
        $this->mailable = $mailable;
        $this->tries = property_exists($mailable, 'tries') ? $mailable->tries : null;
        $this->timeout = property_exists($mailable, 'timeout') ? $mailable->timeout : null;
<<<<<<< HEAD
=======
        $this->maxExceptions = property_exists($mailable, 'maxExceptions') ? $mailable->maxExceptions : null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $this->afterCommit = property_exists($mailable, 'afterCommit') ? $mailable->afterCommit : null;
        $this->shouldBeEncrypted = $mailable instanceof ShouldBeEncrypted;
    }

    /**
     * Handle the queued job.
     *
     * @param  \Illuminate\Contracts\Mail\Factory  $factory
     * @return void
     */
    public function handle(MailFactory $factory)
    {
        $this->mailable->send($factory);
    }

    /**
<<<<<<< HEAD
     * Get the display name for the queued job.
     *
     * @return string
     */
    public function displayName()
    {
        return get_class($this->mailable);
    }

    /**
     * Call the failed method on the mailable instance.
     *
     * @param  \Throwable  $e
     * @return void
     */
    public function failed($e)
    {
        if (method_exists($this->mailable, 'failed')) {
            $this->mailable->failed($e);
        }
    }

    /**
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Get the number of seconds before a released mailable will be available.
     *
     * @return mixed
     */
    public function backoff()
    {
        if (! method_exists($this->mailable, 'backoff') && ! isset($this->mailable->backoff)) {
            return;
        }

        return $this->mailable->backoff ?? $this->mailable->backoff();
    }

    /**
<<<<<<< HEAD
=======
     * Determine the time at which the job should timeout.
     *
     * @return \DateTime|null
     */
    public function retryUntil()
    {
        if (! method_exists($this->mailable, 'retryUntil') && ! isset($this->mailable->retryUntil)) {
            return;
        }

        return $this->mailable->retryUntil ?? $this->mailable->retryUntil();
    }

    /**
     * Call the failed method on the mailable instance.
     *
     * @param  \Throwable  $e
     * @return void
     */
    public function failed($e)
    {
        if (method_exists($this->mailable, 'failed')) {
            $this->mailable->failed($e);
        }
    }

    /**
     * Get the display name for the queued job.
     *
     * @return string
     */
    public function displayName()
    {
        return get_class($this->mailable);
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Prepare the instance for cloning.
     *
     * @return void
     */
    public function __clone()
    {
        $this->mailable = clone $this->mailable;
    }
}
