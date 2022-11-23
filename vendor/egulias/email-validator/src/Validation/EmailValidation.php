<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
<<<<<<< HEAD
use Egulias\EmailValidator\Exception\InvalidEmail;
=======
use Egulias\EmailValidator\Result\InvalidEmail;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Egulias\EmailValidator\Warning\Warning;

interface EmailValidation
{
    /**
     * Returns true if the given email is valid.
     *
     * @param string     $email      The email you want to validate.
     * @param EmailLexer $emailLexer The email lexer.
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isValid($email, EmailLexer $emailLexer);
=======
    public function isValid(string $email, EmailLexer $emailLexer) : bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns the validation error.
     *
     * @return InvalidEmail|null
     */
<<<<<<< HEAD
    public function getError();
=======
    public function getError() : ?InvalidEmail;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns the validation warnings.
     *
     * @return Warning[]
     */
<<<<<<< HEAD
    public function getWarnings();
=======
    public function getWarnings() : array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
