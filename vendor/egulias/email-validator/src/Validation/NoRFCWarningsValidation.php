<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
<<<<<<< HEAD
use Egulias\EmailValidator\Exception\InvalidEmail;
use Egulias\EmailValidator\Validation\Error\RFCWarnings;
=======
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\RFCWarnings;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

class NoRFCWarningsValidation extends RFCValidation
{
    /**
     * @var InvalidEmail|null
     */
    private $error;

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isValid($email, EmailLexer $emailLexer)
=======
    public function isValid(string $email, EmailLexer $emailLexer) : bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!parent::isValid($email, $emailLexer)) {
            return false;
        }

        if (empty($this->getWarnings())) {
            return true;
        }

<<<<<<< HEAD
        $this->error = new RFCWarnings();
=======
        $this->error = new InvalidEmail(new RFCWarnings(), '');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return false;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getError()
=======
    public function getError() : ?InvalidEmail
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->error ?: parent::getError();
    }
}
