<?php

namespace Illuminate\Mail\Transport;

use Illuminate\Support\Collection;
<<<<<<< HEAD
use Swift_Mime_SimpleMessage;

class ArrayTransport extends Transport
{
    /**
     * The collection of Swift Messages.
=======
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\RawMessage;

class ArrayTransport implements TransportInterface
{
    /**
     * The collection of Symfony Messages.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @var \Illuminate\Support\Collection
     */
    protected $messages;

    /**
     * Create a new array transport instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->messages = new Collection;
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @return int
     */
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        $this->beforeSendPerformed($message);

        $this->messages[] = $message;

        return $this->numberOfRecipients($message);
=======
     */
    public function send(RawMessage $message, Envelope $envelope = null): ?SentMessage
    {
        return $this->messages[] = new SentMessage($message, $envelope ?? Envelope::create($message));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Retrieve the collection of messages.
     *
     * @return \Illuminate\Support\Collection
     */
    public function messages()
    {
        return $this->messages;
    }

    /**
     * Clear all of the messages from the local collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function flush()
    {
        return $this->messages = new Collection;
    }
<<<<<<< HEAD
=======

    /**
     * Get the string representation of the transport.
     *
     * @return string
     */
    public function __toString(): string
    {
        return 'array';
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}