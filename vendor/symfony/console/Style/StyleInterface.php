<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Style;

/**
 * Output style helpers.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
interface StyleInterface
{
    /**
     * Formats a command title.
     */
    public function title(string $message);

    /**
     * Formats a section title.
     */
    public function section(string $message);

    /**
     * Formats a list.
     */
    public function listing(array $elements);

    /**
     * Formats informational text.
<<<<<<< HEAD
     *
     * @param string|array $message
     */
    public function text($message);

    /**
     * Formats a success result bar.
     *
     * @param string|array $message
     */
    public function success($message);

    /**
     * Formats an error result bar.
     *
     * @param string|array $message
     */
    public function error($message);

    /**
     * Formats an warning result bar.
     *
     * @param string|array $message
     */
    public function warning($message);

    /**
     * Formats a note admonition.
     *
     * @param string|array $message
     */
    public function note($message);

    /**
     * Formats a caution admonition.
     *
     * @param string|array $message
     */
    public function caution($message);
=======
     */
    public function text(string|array $message);

    /**
     * Formats a success result bar.
     */
    public function success(string|array $message);

    /**
     * Formats an error result bar.
     */
    public function error(string|array $message);

    /**
     * Formats an warning result bar.
     */
    public function warning(string|array $message);

    /**
     * Formats a note admonition.
     */
    public function note(string|array $message);

    /**
     * Formats a caution admonition.
     */
    public function caution(string|array $message);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Formats a table.
     */
    public function table(array $headers, array $rows);

    /**
     * Asks a question.
<<<<<<< HEAD
     *
     * @return mixed
     */
    public function ask(string $question, string $default = null, callable $validator = null);

    /**
     * Asks a question with the user input hidden.
     *
     * @return mixed
     */
    public function askHidden(string $question, callable $validator = null);

    /**
     * Asks for confirmation.
     *
     * @return bool
     */
    public function confirm(string $question, bool $default = true);

    /**
     * Asks a choice question.
     *
     * @param string|int|null $default
     *
     * @return mixed
     */
    public function choice(string $question, array $choices, $default = null);
=======
     */
    public function ask(string $question, string $default = null, callable $validator = null): mixed;

    /**
     * Asks a question with the user input hidden.
     */
    public function askHidden(string $question, callable $validator = null): mixed;

    /**
     * Asks for confirmation.
     */
    public function confirm(string $question, bool $default = true): bool;

    /**
     * Asks a choice question.
     */
    public function choice(string $question, array $choices, mixed $default = null): mixed;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Add newline(s).
     */
    public function newLine(int $count = 1);

    /**
     * Starts the progress output.
     */
    public function progressStart(int $max = 0);

    /**
     * Advances the progress output X steps.
     */
    public function progressAdvance(int $step = 1);

    /**
     * Finishes the progress output.
     */
    public function progressFinish();
}
