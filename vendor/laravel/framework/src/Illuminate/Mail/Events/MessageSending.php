<?php

namespace Illuminate\Mail\Events;

<<<<<<< HEAD
class MessageSending
{
    /**
     * The Swift message instance.
     *
     * @var \Swift_Message
=======
use Symfony\Component\Mime\Email;

class MessageSending
{
    /**
     * The Symfony Email instance.
     *
     * @var \Symfony\Component\Mime\Email
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public $message;

    /**
     * The message data.
     *
     * @var array
     */
    public $data;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
     * @param  \Swift_Message  $message
     * @param  array  $data
     * @return void
     */
    public function __construct($message, $data = [])
=======
     * @param  \Symfony\Component\Mime\Email  $message
     * @param  array  $data
     * @return void
     */
    public function __construct(Email $message, array $data = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->data = $data;
        $this->message = $message;
    }
}
