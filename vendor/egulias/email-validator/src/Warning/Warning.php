<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
    const CODE = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var int
     */
    protected $rfcNumber = 0;

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function code()
    {
<<<<<<< HEAD
        return static::CODE;
=======
        return self::CODE;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * @return int
     */
    public function RFCNumber()
    {
        return $this->rfcNumber;
    }

    public function __toString()
    {
<<<<<<< HEAD
        return $this->message() . " rfc: " .  $this->rfcNumber . "interal code: " . static::CODE;
=======
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . static::CODE;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
