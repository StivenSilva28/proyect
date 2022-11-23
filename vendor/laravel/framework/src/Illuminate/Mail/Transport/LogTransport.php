<?php

namespace Illuminate\Mail\Transport;

use Psr\Log\LoggerInterface;
<<<<<<< HEAD
use Swift_Mime_SimpleMessage;
use Swift_Mime_SimpleMimeEntity;

class LogTransport extends Transport
=======
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\RawMessage;

class LogTransport implements TransportInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
{
    /**
     * The Logger instance.
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Create a new log transport instance.
     *
     * @param  \Psr\Log\LoggerInterface  $logger
     * @return void
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
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

        $this->logger->debug($this->getMimeEntityString($message));

        $this->sendPerformed($message);

        return $this->numberOfRecipients($message);
    }

    /**
     * Get a loggable string out of a Swiftmailer entity.
     *
     * @param  \Swift_Mime_SimpleMimeEntity  $entity
     * @return string
     */
    protected function getMimeEntityString(Swift_Mime_SimpleMimeEntity $entity)
    {
        $string = (string) $entity->getHeaders().PHP_EOL.$entity->getBody();

        foreach ($entity->getChildren() as $children) {
            $string .= PHP_EOL.PHP_EOL.$this->getMimeEntityString($children);
        }

        return $string;
=======
     */
    public function send(RawMessage $message, Envelope $envelope = null): ?SentMessage
    {
        $this->logger->debug($message->toString());

        return new SentMessage($message, $envelope ?? Envelope::create($message));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get the logger for the LogTransport instance.
     *
     * @return \Psr\Log\LoggerInterface
     */
    public function logger()
    {
        return $this->logger;
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
        return 'log';
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
