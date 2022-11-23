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

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\SymfonyQuestionHelper;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\TrimmedBufferOutput;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Terminal;

/**
 * Output decorator helpers for the Symfony Style Guide.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class SymfonyStyle extends OutputStyle
{
    public const MAX_LINE_LENGTH = 120;

<<<<<<< HEAD
    private $input;
    private $output;
    private $questionHelper;
    private $progressBar;
    private $lineLength;
    private $bufferedOutput;
=======
    private InputInterface $input;
    private OutputInterface $output;
    private SymfonyQuestionHelper $questionHelper;
    private ProgressBar $progressBar;
    private int $lineLength;
    private TrimmedBufferOutput $bufferedOutput;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->bufferedOutput = new TrimmedBufferOutput(\DIRECTORY_SEPARATOR === '\\' ? 4 : 2, $output->getVerbosity(), false, clone $output->getFormatter());
        // Windows cmd wraps lines as soon as the terminal width is reached, whether there are following chars or not.
        $width = (new Terminal())->getWidth() ?: self::MAX_LINE_LENGTH;
        $this->lineLength = min($width - (int) (\DIRECTORY_SEPARATOR === '\\'), self::MAX_LINE_LENGTH);

        parent::__construct($this->output = $output);
    }

    /**
     * Formats a message as a block of text.
<<<<<<< HEAD
     *
     * @param string|array $messages The message to write in the block
     */
    public function block($messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = true)
=======
     */
    public function block(string|array $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = true)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $messages = \is_array($messages) ? array_values($messages) : [$messages];

        $this->autoPrependBlock();
        $this->writeln($this->createBlock($messages, $type, $style, $prefix, $padding, $escape));
        $this->newLine();
    }

    /**
     * {@inheritdoc}
     */
    public function title(string $message)
    {
        $this->autoPrependBlock();
        $this->writeln([
            sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)),
            sprintf('<comment>%s</>', str_repeat('=', Helper::width(Helper::removeDecoration($this->getFormatter(), $message)))),
        ]);
        $this->newLine();
    }

    /**
     * {@inheritdoc}
     */
    public function section(string $message)
    {
        $this->autoPrependBlock();
        $this->writeln([
            sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)),
            sprintf('<comment>%s</>', str_repeat('-', Helper::width(Helper::removeDecoration($this->getFormatter(), $message)))),
        ]);
        $this->newLine();
    }

    /**
     * {@inheritdoc}
     */
    public function listing(array $elements)
    {
        $this->autoPrependText();
        $elements = array_map(function ($element) {
            return sprintf(' * %s', $element);
        }, $elements);

        $this->writeln($elements);
        $this->newLine();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function text($message)
=======
    public function text(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->autoPrependText();

        $messages = \is_array($message) ? array_values($message) : [$message];
        foreach ($messages as $message) {
            $this->writeln(sprintf(' %s', $message));
        }
    }

    /**
     * Formats a command comment.
<<<<<<< HEAD
     *
     * @param string|array $message
     */
    public function comment($message)
=======
     */
    public function comment(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, null, null, '<fg=default;bg=default> // </>', false, false);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function success($message)
=======
    public function success(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, 'OK', 'fg=black;bg=green', ' ', true);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function error($message)
=======
    public function error(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, 'ERROR', 'fg=white;bg=red', ' ', true);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function warning($message)
=======
    public function warning(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, 'WARNING', 'fg=black;bg=yellow', ' ', true);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function note($message)
=======
    public function note(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, 'NOTE', 'fg=yellow', ' ! ');
    }

    /**
     * Formats an info message.
<<<<<<< HEAD
     *
     * @param string|array $message
     */
    public function info($message)
=======
     */
    public function info(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, 'INFO', 'fg=green', ' ', true);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function caution($message)
=======
    public function caution(string|array $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->block($message, 'CAUTION', 'fg=white;bg=red', ' ! ', true);
    }

    /**
     * {@inheritdoc}
     */
    public function table(array $headers, array $rows)
    {
        $this->createTable()
            ->setHeaders($headers)
            ->setRows($rows)
            ->render()
        ;

        $this->newLine();
    }

    /**
     * Formats a horizontal table.
     */
    public function horizontalTable(array $headers, array $rows)
    {
        $this->createTable()
            ->setHorizontal(true)
            ->setHeaders($headers)
            ->setRows($rows)
            ->render()
        ;

        $this->newLine();
    }

    /**
     * Formats a list of key/value horizontally.
     *
     * Each row can be one of:
     * * 'A title'
     * * ['key' => 'value']
     * * new TableSeparator()
<<<<<<< HEAD
     *
     * @param string|array|TableSeparator ...$list
     */
    public function definitionList(...$list)
=======
     */
    public function definitionList(string|array|TableSeparator ...$list)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $headers = [];
        $row = [];
        foreach ($list as $value) {
            if ($value instanceof TableSeparator) {
                $headers[] = $value;
                $row[] = $value;
                continue;
            }
            if (\is_string($value)) {
                $headers[] = new TableCell($value, ['colspan' => 2]);
                $row[] = null;
                continue;
            }
            if (!\is_array($value)) {
                throw new InvalidArgumentException('Value should be an array, string, or an instance of TableSeparator.');
            }
            $headers[] = key($value);
            $row[] = current($value);
        }

        $this->horizontalTable($headers, [$row]);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function ask(string $question, string $default = null, callable $validator = null)
=======
    public function ask(string $question, string $default = null, callable $validator = null): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $question = new Question($question, $default);
        $question->setValidator($validator);

        return $this->askQuestion($question);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function askHidden(string $question, callable $validator = null)
=======
    public function askHidden(string $question, callable $validator = null): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $question = new Question($question);

        $question->setHidden(true);
        $question->setValidator($validator);

        return $this->askQuestion($question);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function confirm(string $question, bool $default = true)
=======
    public function confirm(string $question, bool $default = true): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->askQuestion(new ConfirmationQuestion($question, $default));
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function choice(string $question, array $choices, $default = null)
=======
    public function choice(string $question, array $choices, mixed $default = null): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (null !== $default) {
            $values = array_flip($choices);
            $default = $values[$default] ?? $default;
        }

        return $this->askQuestion(new ChoiceQuestion($question, $choices, $default));
    }

    /**
     * {@inheritdoc}
     */
    public function progressStart(int $max = 0)
    {
        $this->progressBar = $this->createProgressBar($max);
        $this->progressBar->start();
    }

    /**
     * {@inheritdoc}
     */
    public function progressAdvance(int $step = 1)
    {
        $this->getProgressBar()->advance($step);
    }

    /**
     * {@inheritdoc}
     */
    public function progressFinish()
    {
        $this->getProgressBar()->finish();
        $this->newLine(2);
<<<<<<< HEAD
        $this->progressBar = null;
=======
        unset($this->progressBar);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function createProgressBar(int $max = 0)
=======
    public function createProgressBar(int $max = 0): ProgressBar
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $progressBar = parent::createProgressBar($max);

        if ('\\' !== \DIRECTORY_SEPARATOR || 'Hyper' === getenv('TERM_PROGRAM')) {
            $progressBar->setEmptyBarCharacter('░'); // light shade character \u2591
            $progressBar->setProgressCharacter('');
            $progressBar->setBarCharacter('▓'); // dark shade character \u2593
        }

        return $progressBar;
    }

    /**
     * @see ProgressBar::iterate()
     */
    public function progressIterate(iterable $iterable, int $max = null): iterable
    {
        yield from $this->createProgressBar()->iterate($iterable, $max);

        $this->newLine(2);
    }

<<<<<<< HEAD
    /**
     * @return mixed
     */
    public function askQuestion(Question $question)
=======
    public function askQuestion(Question $question): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->input->isInteractive()) {
            $this->autoPrependBlock();
        }

<<<<<<< HEAD
        if (!$this->questionHelper) {
            $this->questionHelper = new SymfonyQuestionHelper();
        }
=======
        $this->questionHelper ??= new SymfonyQuestionHelper();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        $answer = $this->questionHelper->ask($this->input, $this, $question);

        if ($this->input->isInteractive()) {
            $this->newLine();
            $this->bufferedOutput->write("\n");
        }

        return $answer;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function writeln($messages, int $type = self::OUTPUT_NORMAL)
=======
    public function writeln(string|iterable $messages, int $type = self::OUTPUT_NORMAL)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!is_iterable($messages)) {
            $messages = [$messages];
        }

        foreach ($messages as $message) {
            parent::writeln($message, $type);
            $this->writeBuffer($message, true, $type);
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function write($messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
=======
    public function write(string|iterable $messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!is_iterable($messages)) {
            $messages = [$messages];
        }

        foreach ($messages as $message) {
            parent::write($message, $newline, $type);
            $this->writeBuffer($message, $newline, $type);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function newLine(int $count = 1)
    {
        parent::newLine($count);
        $this->bufferedOutput->write(str_repeat("\n", $count));
    }

    /**
     * Returns a new instance which makes use of stderr if available.
<<<<<<< HEAD
     *
     * @return self
     */
    public function getErrorStyle()
=======
     */
    public function getErrorStyle(): self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new self($this->input, $this->getErrorOutput());
    }

    public function createTable(): Table
    {
        $output = $this->output instanceof ConsoleOutputInterface ? $this->output->section() : $this->output;
        $style = clone Table::getStyleDefinition('symfony-style-guide');
        $style->setCellHeaderFormat('<info>%s</info>');

        return (new Table($output))->setStyle($style);
    }

    private function getProgressBar(): ProgressBar
    {
<<<<<<< HEAD
        if (!$this->progressBar) {
            throw new RuntimeException('The ProgressBar is not started.');
        }

        return $this->progressBar;
=======
        return $this->progressBar
            ?? throw new RuntimeException('The ProgressBar is not started.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    private function autoPrependBlock(): void
    {
        $chars = substr(str_replace(\PHP_EOL, "\n", $this->bufferedOutput->fetch()), -2);

        if (!isset($chars[0])) {
            $this->newLine(); // empty history, so we should start with a new line.

            return;
        }
        // Prepend new line for each non LF chars (This means no blank line was output before)
        $this->newLine(2 - substr_count($chars, "\n"));
    }

    private function autoPrependText(): void
    {
        $fetched = $this->bufferedOutput->fetch();
        // Prepend new line if last char isn't EOL:
        if (!str_ends_with($fetched, "\n")) {
            $this->newLine();
        }
    }

    private function writeBuffer(string $message, bool $newLine, int $type): void
    {
        // We need to know if the last chars are PHP_EOL
        $this->bufferedOutput->write($message, $newLine, $type);
    }

    private function createBlock(iterable $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = false): array
    {
        $indentLength = 0;
        $prefixLength = Helper::width(Helper::removeDecoration($this->getFormatter(), $prefix));
        $lines = [];

        if (null !== $type) {
            $type = sprintf('[%s] ', $type);
            $indentLength = \strlen($type);
            $lineIndentation = str_repeat(' ', $indentLength);
        }

        // wrap and add newlines for each element
        foreach ($messages as $key => $message) {
            if ($escape) {
                $message = OutputFormatter::escape($message);
            }

            $decorationLength = Helper::width($message) - Helper::width(Helper::removeDecoration($this->getFormatter(), $message));
            $messageLineLength = min($this->lineLength - $prefixLength - $indentLength + $decorationLength, $this->lineLength);
            $messageLines = explode(\PHP_EOL, wordwrap($message, $messageLineLength, \PHP_EOL, true));
            foreach ($messageLines as $messageLine) {
                $lines[] = $messageLine;
            }

            if (\count($messages) > 1 && $key < \count($messages) - 1) {
                $lines[] = '';
            }
        }

        $firstLineIndex = 0;
        if ($padding && $this->isDecorated()) {
            $firstLineIndex = 1;
            array_unshift($lines, '');
            $lines[] = '';
        }

        foreach ($lines as $i => &$line) {
            if (null !== $type) {
                $line = $firstLineIndex === $i ? $type.$line : $lineIndentation.$line;
            }

            $line = $prefix.$line;
            $line .= str_repeat(' ', max($this->lineLength - Helper::width(Helper::removeDecoration($this->getFormatter(), $line)), 0));

            if ($style) {
                $line = sprintf('<%s>%s</>', $style, $line);
            }
        }

        return $lines;
    }
}