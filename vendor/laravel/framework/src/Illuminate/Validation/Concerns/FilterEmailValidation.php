<?php

namespace Illuminate\Validation\Concerns;

use Egulias\EmailValidator\EmailLexer;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Result\InvalidEmail;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Egulias\EmailValidator\Validation\EmailValidation;

class FilterEmailValidation implements EmailValidation
{
    /**
     * The flags to pass to the filter_var function.
     *
     * @var int|null
     */
    protected $flags;

    /**
     * Create a new validation instance.
     *
     * @param  int  $flags
     * @return void
     */
    public function __construct($flags = null)
    {
        $this->flags = $flags;
    }

    /**
     * Create a new instance which allows any unicode characters in local-part.
     *
     * @return static
     */
    public static function unicode()
    {
        return new static(FILTER_FLAG_EMAIL_UNICODE);
    }

    /**
     * Returns true if the given email is valid.
     *
     * @param  string  $email
     * @param  \Egulias\EmailValidator\EmailLexer  $emailLexer
     * @return bool
     */
<<<<<<< HEAD
    public function isValid($email, EmailLexer $emailLexer)
=======
    public function isValid(string $email, EmailLexer $emailLexer): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return is_null($this->flags)
                    ? filter_var($email, FILTER_VALIDATE_EMAIL) !== false
                    : filter_var($email, FILTER_VALIDATE_EMAIL, $this->flags) !== false;
    }

    /**
     * Returns the validation error.
     *
<<<<<<< HEAD
     * @return \Egulias\EmailValidator\Exception\InvalidEmail|null
     */
    public function getError()
    {
        //
=======
     * @return \Egulias\EmailValidator\Result\InvalidEmail|null
     */
    public function getError(): ?InvalidEmail
    {
        return null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Returns the validation warnings.
     *
     * @return \Egulias\EmailValidator\Warning\Warning[]
     */
<<<<<<< HEAD
    public function getWarnings()
=======
    public function getWarnings(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return [];
    }
}
