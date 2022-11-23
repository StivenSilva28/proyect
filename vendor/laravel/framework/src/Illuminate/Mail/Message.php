<?php

namespace Illuminate\Mail;

<<<<<<< HEAD
use Illuminate\Support\Traits\ForwardsCalls;
use Swift_Attachment;
use Swift_Image;

/**
 * @mixin \Swift_Message
=======
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\ForwardsCalls;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

/**
 * @mixin \Symfony\Component\Mime\Email
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 */
class Message
{
    use ForwardsCalls;

    /**
<<<<<<< HEAD
     * The Swift Message instance.
     *
     * @var \Swift_Message
     */
    protected $swift;
=======
     * The Symfony Email instance.
     *
     * @var \Symfony\Component\Mime\Email
     */
    protected $message;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * CIDs of files embedded in the message.
     *
<<<<<<< HEAD
=======
     * @deprecated Will be removed in a future Laravel version.
     *
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @var array
     */
    protected $embeddedFiles = [];

    /**
     * Create a new message instance.
     *
<<<<<<< HEAD
     * @param  \Swift_Message  $swift
     * @return void
     */
    public function __construct($swift)
    {
        $this->swift = $swift;
=======
     * @param  \Symfony\Component\Mime\Email  $message
     * @return void
     */
    public function __construct(Email $message)
    {
        $this->message = $message;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Add a "from" address to the message.
     *
     * @param  string|array  $address
     * @param  string|null  $name
     * @return $this
     */
    public function from($address, $name = null)
    {
<<<<<<< HEAD
        $this->swift->setFrom($address, $name);
=======
        is_array($address)
            ? $this->message->from(...$address)
            : $this->message->from(new Address($address, (string) $name));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Set the "sender" of the message.
     *
     * @param  string|array  $address
     * @param  string|null  $name
     * @return $this
     */
    public function sender($address, $name = null)
    {
<<<<<<< HEAD
        $this->swift->setSender($address, $name);
=======
        is_array($address)
            ? $this->message->sender(...$address)
            : $this->message->sender(new Address($address, (string) $name));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Set the "return path" of the message.
     *
     * @param  string  $address
     * @return $this
     */
    public function returnPath($address)
    {
<<<<<<< HEAD
        $this->swift->setReturnPath($address);
=======
        $this->message->returnPath($address);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Add a recipient to the message.
     *
     * @param  string|array  $address
     * @param  string|null  $name
     * @param  bool  $override
     * @return $this
     */
    public function to($address, $name = null, $override = false)
    {
        if ($override) {
<<<<<<< HEAD
            $this->swift->setTo($address, $name);
=======
            is_array($address)
                ? $this->message->to(...$address)
                : $this->message->to(new Address($address, (string) $name));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            return $this;
        }

        return $this->addAddresses($address, $name, 'To');
    }

    /**
<<<<<<< HEAD
=======
     * Remove all "to" addresses from the message.
     *
     * @return $this
     */
    public function forgetTo()
    {
        if ($header = $this->message->getHeaders()->get('To')) {
            $this->addAddressDebugHeader('X-To', $this->message->getTo());

            $header->setAddresses([]);
        }

        return $this;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Add a carbon copy to the message.
     *
     * @param  string|array  $address
     * @param  string|null  $name
     * @param  bool  $override
     * @return $this
     */
    public function cc($address, $name = null, $override = false)
    {
        if ($override) {
<<<<<<< HEAD
            $this->swift->setCc($address, $name);
=======
            is_array($address)
                ? $this->message->cc(...$address)
                : $this->message->cc(new Address($address, (string) $name));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            return $this;
        }

        return $this->addAddresses($address, $name, 'Cc');
    }

    /**
<<<<<<< HEAD
=======
     * Remove all carbon copy addresses from the message.
     *
     * @return $this
     */
    public function forgetCc()
    {
        if ($header = $this->message->getHeaders()->get('Cc')) {
            $this->addAddressDebugHeader('X-Cc', $this->message->getCC());

            $header->setAddresses([]);
        }

        return $this;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Add a blind carbon copy to the message.
     *
     * @param  string|array  $address
     * @param  string|null  $name
     * @param  bool  $override
     * @return $this
     */
    public function bcc($address, $name = null, $override = false)
    {
        if ($override) {
<<<<<<< HEAD
            $this->swift->setBcc($address, $name);
=======
            is_array($address)
                ? $this->message->bcc(...$address)
                : $this->message->bcc(new Address($address, (string) $name));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            return $this;
        }

        return $this->addAddresses($address, $name, 'Bcc');
    }

    /**
<<<<<<< HEAD
=======
     * Remove all of the blind carbon copy addresses from the message.
     *
     * @return $this
     */
    public function forgetBcc()
    {
        if ($header = $this->message->getHeaders()->get('Bcc')) {
            $this->addAddressDebugHeader('X-Bcc', $this->message->getBcc());

            $header->setAddresses([]);
        }

        return $this;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Add a "reply to" address to the message.
     *
     * @param  string|array  $address
     * @param  string|null  $name
     * @return $this
     */
    public function replyTo($address, $name = null)
    {
        return $this->addAddresses($address, $name, 'ReplyTo');
    }

    /**
     * Add a recipient to the message.
     *
     * @param  string|array  $address
     * @param  string  $name
     * @param  string  $type
     * @return $this
     */
    protected function addAddresses($address, $name, $type)
    {
        if (is_array($address)) {
<<<<<<< HEAD
            $this->swift->{"set{$type}"}($address, $name);
        } else {
            $this->swift->{"add{$type}"}($address, $name);
=======
            $type = lcfirst($type);

            $addresses = collect($address)->map(function ($address, $key) {
                if (is_string($key) && is_string($address)) {
                    return new Address($key, $address);
                }

                if (is_array($address)) {
                    return new Address($address['email'] ?? $address['address'], $address['name'] ?? null);
                }

                if (is_null($address)) {
                    return new Address($key);
                }

                return $address;
            })->all();

            $this->message->{"{$type}"}(...$addresses);
        } else {
            $this->message->{"add{$type}"}(new Address($address, (string) $name));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Add an address debug header for a list of recipients.
     *
     * @param  string  $header
     * @param  \Symfony\Component\Mime\Address[]  $addresses
     * @return $this
     */
    protected function addAddressDebugHeader(string $header, array $addresses)
    {
        $this->message->getHeaders()->addTextHeader(
            $header,
            implode(', ', array_map(fn ($a) => $a->toString(), $addresses)),
        );

        return $this;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Set the subject of the message.
     *
     * @param  string  $subject
     * @return $this
     */
    public function subject($subject)
    {
<<<<<<< HEAD
        $this->swift->setSubject($subject);
=======
        $this->message->subject($subject);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Set the message priority level.
     *
     * @param  int  $level
     * @return $this
     */
    public function priority($level)
    {
<<<<<<< HEAD
        $this->swift->setPriority($level);
=======
        $this->message->priority($level);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Attach a file to the message.
     *
<<<<<<< HEAD
     * @param  string  $file
=======
     * @param  string|\Illuminate\Contracts\Mail\Attachable|\Illuminate\Mail\Attachment  $file
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  array  $options
     * @return $this
     */
    public function attach($file, array $options = [])
    {
<<<<<<< HEAD
        $attachment = $this->createAttachmentFromPath($file);

        return $this->prepAttachment($attachment, $options);
    }

    /**
     * Create a Swift Attachment instance.
     *
     * @param  string  $file
     * @return \Swift_Mime_Attachment
     */
    protected function createAttachmentFromPath($file)
    {
        return Swift_Attachment::fromPath($file);
=======
        if ($file instanceof Attachable) {
            $file = $file->toMailAttachment();
        }

        if ($file instanceof Attachment) {
            return $file->attachTo($this);
        }

        $this->message->attachFromPath($file, $options['as'] ?? null, $options['mime'] ?? null);

        return $this;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Attach in-memory data as an attachment.
     *
     * @param  string  $data
     * @param  string  $name
     * @param  array  $options
     * @return $this
     */
    public function attachData($data, $name, array $options = [])
    {
<<<<<<< HEAD
        $attachment = $this->createAttachmentFromData($data, $name);

        return $this->prepAttachment($attachment, $options);
    }

    /**
     * Create a Swift Attachment instance from data.
     *
     * @param  string  $data
     * @param  string  $name
     * @return \Swift_Attachment
     */
    protected function createAttachmentFromData($data, $name)
    {
        return new Swift_Attachment($data, $name);
=======
        $this->message->attach($data, $name, $options['mime'] ?? null);

        return $this;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Embed a file in the message and get the CID.
     *
<<<<<<< HEAD
     * @param  string  $file
=======
     * @param  string|\Illuminate\Contracts\Mail\Attachable|\Illuminate\Mail\Attachment  $file
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return string
     */
    public function embed($file)
    {
<<<<<<< HEAD
        if (isset($this->embeddedFiles[$file])) {
            return $this->embeddedFiles[$file];
        }

        return $this->embeddedFiles[$file] = $this->swift->embed(
            Swift_Image::fromPath($file)
        );
=======
        if ($file instanceof Attachable) {
            $file = $file->toMailAttachment();
        }

        if ($file instanceof Attachment) {
            return $file->attachWith(
                function ($path) use ($file) {
                    $cid = $file->as ?? Str::random();

                    $this->message->embedFromPath($path, $cid, $file->mime);

                    return "cid:{$cid}";
                },
                function ($data) use ($file) {
                    $this->message->embed($data(), $file->as, $file->mime);

                    return "cid:{$file->as}";
                }
            );
        }

        $cid = Str::random(10);

        $this->message->embedFromPath($file, $cid);

        return "cid:$cid";
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Embed in-memory data in the message and get the CID.
     *
     * @param  string  $data
     * @param  string  $name
     * @param  string|null  $contentType
     * @return string
     */
    public function embedData($data, $name, $contentType = null)
    {
<<<<<<< HEAD
        $image = new Swift_Image($data, $name, $contentType);

        return $this->swift->embed($image);
    }

    /**
     * Prepare and attach the given attachment.
     *
     * @param  \Swift_Attachment  $attachment
     * @param  array  $options
     * @return $this
     */
    protected function prepAttachment($attachment, $options = [])
    {
        // First we will check for a MIME type on the message, which instructs the
        // mail client on what type of attachment the file is so that it may be
        // downloaded correctly by the user. The MIME option is not required.
        if (isset($options['mime'])) {
            $attachment->setContentType($options['mime']);
        }

        // If an alternative name was given as an option, we will set that on this
        // attachment so that it will be downloaded with the desired names from
        // the developer, otherwise the default file names will get assigned.
        if (isset($options['as'])) {
            $attachment->setFilename($options['as']);
        }

        $this->swift->attach($attachment);

        return $this;
    }

    /**
     * Get the underlying Swift Message instance.
     *
     * @return \Swift_Message
     */
    public function getSwiftMessage()
    {
        return $this->swift;
    }

    /**
     * Dynamically pass missing methods to the Swift instance.
=======
        $this->message->embed($data, $name, $contentType);

        return "cid:$name";
    }

    /**
     * Get the underlying Symfony Email instance.
     *
     * @return \Symfony\Component\Mime\Email
     */
    public function getSymfonyMessage()
    {
        return $this->message;
    }

    /**
     * Dynamically pass missing methods to the Symfony instance.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
        return $this->forwardCallTo($this->swift, $method, $parameters);
=======
        return $this->forwardDecoratedCallTo($this->message, $method, $parameters);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
