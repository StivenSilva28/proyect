<?php

namespace Illuminate\Auth;

<<<<<<< HEAD
use Illuminate\Support\Str;

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class Recaller
{
    /**
     * The "recaller" / "remember me" cookie string.
     *
     * @var string
     */
    protected $recaller;

    /**
     * Create a new recaller instance.
     *
     * @param  string  $recaller
     * @return void
     */
    public function __construct($recaller)
    {
        $this->recaller = @unserialize($recaller, ['allowed_classes' => false]) ?: $recaller;
    }

    /**
     * Get the user ID from the recaller.
     *
     * @return string
     */
    public function id()
    {
        return explode('|', $this->recaller, 3)[0];
    }

    /**
     * Get the "remember token" token from the recaller.
     *
     * @return string
     */
    public function token()
    {
        return explode('|', $this->recaller, 3)[1];
    }

    /**
     * Get the password from the recaller.
     *
     * @return string
     */
    public function hash()
    {
<<<<<<< HEAD
        return explode('|', $this->recaller, 3)[2];
=======
        return explode('|', $this->recaller, 4)[2];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Determine if the recaller is valid.
     *
     * @return bool
     */
    public function valid()
    {
        return $this->properString() && $this->hasAllSegments();
    }

    /**
     * Determine if the recaller is an invalid string.
     *
     * @return bool
     */
    protected function properString()
    {
<<<<<<< HEAD
        return is_string($this->recaller) && Str::contains($this->recaller, '|');
=======
        return is_string($this->recaller) && str_contains($this->recaller, '|');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Determine if the recaller has all segments.
     *
     * @return bool
     */
    protected function hasAllSegments()
    {
        $segments = explode('|', $this->recaller);

<<<<<<< HEAD
        return count($segments) === 3 && trim($segments[0]) !== '' && trim($segments[1]) !== '';
=======
        return count($segments) >= 3 && trim($segments[0]) !== '' && trim($segments[1]) !== '';
    }

    /**
     * Get the recaller's segments.
     *
     * @return array
     */
    public function segments()
    {
        return explode('|', $this->recaller);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
