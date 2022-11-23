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

final class EmailAttachmentCount extends Constraint
{
<<<<<<< HEAD
    private $expectedValue;
    private $transport;
=======
    private int $expectedValue;
    private ?string $transport;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(int $expectedValue, string $transport = null)
    {
        $this->expectedValue = $expectedValue;
        $this->transport = $transport;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return sprintf('has sent "%d" attachment(s)', $this->expectedValue);
    }

    /**
     * @param RawMessage $message
     *
     * {@inheritdoc}
     */
    protected function matches($message): bool
    {
        if (RawMessage::class === \get_class($message) || Message::class === \get_class($message)) {
            throw new \LogicException('Unable to test a message attachment on a RawMessage or Message instance.');
        }

        return $this->expectedValue === \count($message->getAttachments());
    }

    /**
     * @param RawMessage $message
     *
     * {@inheritdoc}
     */
    protected function failureDescription($message): string
    {
        return 'the Email '.$this->toString();
    }
}