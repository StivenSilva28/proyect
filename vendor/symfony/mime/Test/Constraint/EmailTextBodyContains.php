<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Test\Constraint;

use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\RawMessage;

final class EmailTextBodyContains extends Constraint
{
<<<<<<< HEAD
    private $expectedText;
=======
    private string $expectedText;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $expectedText)
    {
        $this->expectedText = $expectedText;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return sprintf('contains "%s"', $this->expectedText);
    }

    /**
     * {@inheritdoc}
     *
     * @param RawMessage $message
     */
    protected function matches($message): bool
    {
        if (RawMessage::class === \get_class($message) || Message::class === \get_class($message)) {
            throw new \LogicException('Unable to test a message text body on a RawMessage or Message instance.');
        }

<<<<<<< HEAD
        return false !== mb_strpos($message->getTextBody(), $this->expectedText);
=======
        return str_contains($message->getTextBody(), $this->expectedText);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * {@inheritdoc}
     *
     * @param RawMessage $message
     */
    protected function failureDescription($message): string
    {
        return 'the Email text body '.$this->toString();
    }
}