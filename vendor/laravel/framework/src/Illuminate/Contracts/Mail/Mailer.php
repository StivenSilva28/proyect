<?php

namespace Illuminate\Contracts\Mail;

interface Mailer
{
    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param  mixed  $users
     * @return \Illuminate\Mail\PendingMail
     */
    public function to($users);

    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param  mixed  $users
     * @return \Illuminate\Mail\PendingMail
     */
    public function bcc($users);

    /**
     * Send a new message with only a raw text part.
     *
     * @param  string  $text
     * @param  mixed  $callback
<<<<<<< HEAD
     * @return void
=======
     * @return \Illuminate\Mail\SentMessage|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function raw($text, $callback);

    /**
     * Send a new message using a view.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
     * @param  array  $data
     * @param  \Closure|string|null  $callback
<<<<<<< HEAD
     * @return void
     */
    public function send($view, array $data = [], $callback = null);

    /**
     * Get the array of failed recipients.
     *
     * @return array
     */
    public function failures();
=======
     * @return \Illuminate\Mail\SentMessage|null
     */
    public function send($view, array $data = [], $callback = null);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
