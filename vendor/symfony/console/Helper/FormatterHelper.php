<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

use Symfony\Component\Console\Formatter\OutputFormatter;

/**
 * The Formatter class provides helpers to format messages.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FormatterHelper extends Helper
{
    /**
     * Formats a message within a section.
<<<<<<< HEAD
     *
     * @return string
     */
    public function formatSection(string $section, string $message, string $style = 'info')
=======
     */
    public function formatSection(string $section, string $message, string $style = 'info'): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return sprintf('<%s>[%s]</%s> %s', $style, $section, $style, $message);
    }

    /**
     * Formats a message as a block of text.
<<<<<<< HEAD
     *
     * @param string|array $messages The message to write in the block
     *
     * @return string
     */
    public function formatBlock($messages, string $style, bool $large = false)
=======
     */
    public function formatBlock(string|array $messages, string $style, bool $large = false): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!\is_array($messages)) {
            $messages = [$messages];
        }

        $len = 0;
        $lines = [];
        foreach ($messages as $message) {
            $message = OutputFormatter::escape($message);
            $lines[] = sprintf($large ? '  %s  ' : ' %s ', $message);
            $len = max(self::width($message) + ($large ? 4 : 2), $len);
        }

        $messages = $large ? [str_repeat(' ', $len)] : [];
        for ($i = 0; isset($lines[$i]); ++$i) {
            $messages[] = $lines[$i].str_repeat(' ', $len - self::width($lines[$i]));
        }
        if ($large) {
            $messages[] = str_repeat(' ', $len);
        }

        for ($i = 0; isset($messages[$i]); ++$i) {
            $messages[$i] = sprintf('<%s>%s</%s>', $style, $messages[$i], $style);
        }

        return implode("\n", $messages);
    }

    /**
     * Truncates a message to the given length.
<<<<<<< HEAD
     *
     * @return string
     */
    public function truncate(string $message, int $length, string $suffix = '...')
=======
     */
    public function truncate(string $message, int $length, string $suffix = '...'): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $computedLength = $length - self::width($suffix);

        if ($computedLength > self::width($message)) {
            return $message;
        }

        return self::substr($message, 0, $length).$suffix;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName()
=======
    public function getName(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return 'formatter';
    }
}
