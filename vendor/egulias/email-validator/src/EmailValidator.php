<?php

namespace Egulias\EmailValidator;

<<<<<<< HEAD
use Egulias\EmailValidator\Exception\InvalidEmail;
=======
use Egulias\EmailValidator\Result\InvalidEmail;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Egulias\EmailValidator\Validation\EmailValidation;

class EmailValidator
{
    /**
     * @var EmailLexer
     */
    private $lexer;

    /**
     * @var Warning\Warning[]
     */
<<<<<<< HEAD
    protected $warnings = [];

    /**
     * @var InvalidEmail|null
     */
    protected $error;
=======
    private $warnings = [];

    /**
     * @var ?InvalidEmail
     */
    private $error;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct()
    {
        $this->lexer = new EmailLexer();
    }

    /**
     * @param string          $email
     * @param EmailValidation $emailValidation
     * @return bool
     */
<<<<<<< HEAD
    public function isValid($email, EmailValidation $emailValidation)
=======
    public function isValid(string $email, EmailValidation $emailValidation)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $isValid = $emailValidation->isValid($email, $this->lexer);
        $this->warnings = $emailValidation->getWarnings();
        $this->error = $emailValidation->getError();

        return $isValid;
    }

    /**
     * @return boolean
     */
    public function hasWarnings()
    {
        return !empty($this->warnings);
    }

    /**
     * @return array
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * @return InvalidEmail|null
     */
    public function getError()
    {
        return $this->error;
    }
}
