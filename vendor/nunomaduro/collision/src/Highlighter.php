<?php

declare(strict_types=1);

namespace NunoMaduro\Collision;

use NunoMaduro\Collision\Contracts\Highlighter as HighlighterContract;

/**
 * @internal
 */
final class Highlighter implements HighlighterContract
{
<<<<<<< HEAD
    public const TOKEN_DEFAULT    = 'token_default';
    public const TOKEN_COMMENT    = 'token_comment';
    public const TOKEN_STRING     = 'token_string';
    public const TOKEN_HTML       = 'token_html';
    public const TOKEN_KEYWORD    = 'token_keyword';
    public const ACTUAL_LINE_MARK = 'actual_line_mark';
    public const LINE_NUMBER      = 'line_number';

    private const ARROW_SYMBOL        = '>';
    private const DELIMITER           = '|';
    private const ARROW_SYMBOL_UTF8   = '➜';
    private const DELIMITER_UTF8      = '▕'; // '▶';
    private const LINE_NUMBER_DIVIDER = 'line_divider';
    private const MARKED_LINE_NUMBER  = 'marked_line';
    private const WIDTH               = 3;
=======
    public const TOKEN_DEFAULT = 'token_default';

    public const TOKEN_COMMENT = 'token_comment';

    public const TOKEN_STRING = 'token_string';

    public const TOKEN_HTML = 'token_html';

    public const TOKEN_KEYWORD = 'token_keyword';

    public const ACTUAL_LINE_MARK = 'actual_line_mark';

    public const LINE_NUMBER = 'line_number';

    private const ARROW_SYMBOL = '>';

    private const DELIMITER = '|';

    private const ARROW_SYMBOL_UTF8 = '➜';

    private const DELIMITER_UTF8 = '▕'; // '▶';

    private const LINE_NUMBER_DIVIDER = 'line_divider';

    private const MARKED_LINE_NUMBER = 'marked_line';

    private const WIDTH = 3;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    /**
     * Holds the theme.
     *
     * @var array
     */
    private const THEME = [
<<<<<<< HEAD
        self::TOKEN_STRING  => ['light_gray'],
        self::TOKEN_COMMENT => ['dark_gray', 'italic'],
        self::TOKEN_KEYWORD => ['magenta', 'bold'],
        self::TOKEN_DEFAULT => ['default', 'bold'],
        self::TOKEN_HTML    => ['blue', 'bold'],

        self::ACTUAL_LINE_MARK    => ['red', 'bold'],
        self::LINE_NUMBER         => ['dark_gray'],
        self::MARKED_LINE_NUMBER  => ['italic', 'bold'],
        self::LINE_NUMBER_DIVIDER => ['dark_gray'],
    ];
=======
        self::TOKEN_STRING => ['light_gray'],
        self::TOKEN_COMMENT => ['dark_gray', 'italic'],
        self::TOKEN_KEYWORD => ['magenta', 'bold'],
        self::TOKEN_DEFAULT => ['default', 'bold'],
        self::TOKEN_HTML => ['blue', 'bold'],

        self::ACTUAL_LINE_MARK => ['red', 'bold'],
        self::LINE_NUMBER => ['dark_gray'],
        self::MARKED_LINE_NUMBER => ['italic', 'bold'],
        self::LINE_NUMBER_DIVIDER => ['dark_gray'],
    ];

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    /** @var ConsoleColor */
    private $color;

    /** @var array */
    private const DEFAULT_THEME = [
<<<<<<< HEAD
        self::TOKEN_STRING  => 'red',
        self::TOKEN_COMMENT => 'yellow',
        self::TOKEN_KEYWORD => 'green',
        self::TOKEN_DEFAULT => 'default',
        self::TOKEN_HTML    => 'cyan',

        self::ACTUAL_LINE_MARK    => 'dark_gray',
        self::LINE_NUMBER         => 'dark_gray',
        self::MARKED_LINE_NUMBER  => 'dark_gray',
        self::LINE_NUMBER_DIVIDER => 'dark_gray',
    ];
    /** @var string */
    private $delimiter = self::DELIMITER_UTF8;
    /** @var string */
    private $arrow = self::ARROW_SYMBOL_UTF8;
=======
        self::TOKEN_STRING => 'red',
        self::TOKEN_COMMENT => 'yellow',
        self::TOKEN_KEYWORD => 'green',
        self::TOKEN_DEFAULT => 'default',
        self::TOKEN_HTML => 'cyan',

        self::ACTUAL_LINE_MARK => 'dark_gray',
        self::LINE_NUMBER => 'dark_gray',
        self::MARKED_LINE_NUMBER => 'dark_gray',
        self::LINE_NUMBER_DIVIDER => 'dark_gray',
    ];

    /** @var string */
    private $delimiter = self::DELIMITER_UTF8;

    /** @var string */
    private $arrow = self::ARROW_SYMBOL_UTF8;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    /**
     * @var string
     */
    private const NO_MARK = '    ';

    /**
     * Creates an instance of the Highlighter.
     */
    public function __construct(ConsoleColor $color = null, bool $UTF8 = true)
    {
        $this->color = $color ?: new ConsoleColor();

        foreach (self::DEFAULT_THEME as $name => $styles) {
<<<<<<< HEAD
            if (!$this->color->hasTheme($name)) {
=======
            if (! $this->color->hasTheme($name)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $this->color->addTheme($name, $styles);
            }
        }

        foreach (self::THEME as $name => $styles) {
            $this->color->addTheme($name, $styles);
        }
<<<<<<< HEAD
        if (!$UTF8) {
            $this->delimiter = self::DELIMITER;
            $this->arrow     = self::ARROW_SYMBOL;
=======
        if (! $UTF8) {
            $this->delimiter = self::DELIMITER;
            $this->arrow = self::ARROW_SYMBOL;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
        $this->delimiter .= ' ';
    }

    /**
     * {@inheritdoc}
     */
    public function highlight(string $content, int $line): string
    {
        return rtrim($this->getCodeSnippet($content, $line, 4, 4));
    }

    /**
<<<<<<< HEAD
     * @param string $source
     * @param int    $lineNumber
     * @param int    $linesBefore
     * @param int    $linesAfter
=======
     * @param  string  $source
     * @param  int  $lineNumber
     * @param  int  $linesBefore
     * @param  int  $linesAfter
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getCodeSnippet($source, $lineNumber, $linesBefore = 2, $linesAfter = 2): string
    {
        $tokenLines = $this->getHighlightedLines($source);

<<<<<<< HEAD
        $offset     = $lineNumber - $linesBefore - 1;
        $offset     = max($offset, 0);
        $length     = $linesAfter + $linesBefore + 1;
=======
        $offset = $lineNumber - $linesBefore - 1;
        $offset = max($offset, 0);
        $length = $linesAfter + $linesBefore + 1;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $tokenLines = array_slice($tokenLines, $offset, $length, $preserveKeys = true);

        $lines = $this->colorLines($tokenLines);

        return $this->lineNumbers($lines, $lineNumber);
    }

    /**
<<<<<<< HEAD
     * @param string $source
=======
     * @param  string  $source
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    private function getHighlightedLines($source): array
    {
        $source = str_replace(["\r\n", "\r"], "\n", $source);
        $tokens = $this->tokenize($source);

        return $this->splitToLines($tokens);
    }

    /**
<<<<<<< HEAD
     * @param string $source
=======
     * @param  string  $source
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    private function tokenize($source): array
    {
        $tokens = token_get_all($source);

<<<<<<< HEAD
        $output      = [];
        $currentType = null;
        $buffer      = '';
=======
        $output = [];
        $currentType = null;
        $buffer = '';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        foreach ($tokens as $token) {
            if (is_array($token)) {
                switch ($token[0]) {
                    case T_WHITESPACE:
                        break;

                    case T_OPEN_TAG:
                    case T_OPEN_TAG_WITH_ECHO:
                    case T_CLOSE_TAG:
                    case T_STRING:
                    case T_VARIABLE:
                        // Constants
                    case T_DIR:
                    case T_FILE:
                    case T_METHOD_C:
                    case T_DNUMBER:
                    case T_LNUMBER:
                    case T_NS_C:
                    case T_LINE:
                    case T_CLASS_C:
                    case T_FUNC_C:
                    case T_TRAIT_C:
                        $newType = self::TOKEN_DEFAULT;
                        break;

                    case T_COMMENT:
                    case T_DOC_COMMENT:
                        $newType = self::TOKEN_COMMENT;
                        break;

                    case T_ENCAPSED_AND_WHITESPACE:
                    case T_CONSTANT_ENCAPSED_STRING:
                        $newType = self::TOKEN_STRING;
                        break;

                    case T_INLINE_HTML:
                        $newType = self::TOKEN_HTML;
                        break;

                    default:
                        $newType = self::TOKEN_KEYWORD;
                }
            } else {
                $newType = $token === '"' ? self::TOKEN_STRING : self::TOKEN_KEYWORD;
            }

            if ($currentType === null) {
                $currentType = $newType;
            }

            if ($currentType !== $newType) {
<<<<<<< HEAD
                $output[]    = [$currentType, $buffer];
                $buffer      = '';
=======
                $output[] = [$currentType, $buffer];
                $buffer = '';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $currentType = $newType;
            }

            $buffer .= is_array($token) ? $token[1] : $token;
        }

        if (isset($newType)) {
            $output[] = [$newType, $buffer];
        }

        return $output;
    }

    private function splitToLines(array $tokens): array
    {
        $lines = [];

        $line = [];
        foreach ($tokens as $token) {
            foreach (explode("\n", $token[1]) as $count => $tokenLine) {
                if ($count > 0) {
                    $lines[] = $line;
<<<<<<< HEAD
                    $line    = [];
=======
                    $line = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                }

                if ($tokenLine === '') {
                    continue;
                }

                $line[] = [$token[0], $tokenLine];
            }
        }

        $lines[] = $line;

        return $lines;
    }

    private function colorLines(array $tokenLines): array
    {
        $lines = [];
        foreach ($tokenLines as $lineCount => $tokenLine) {
            $line = '';
            foreach ($tokenLine as $token) {
                [$tokenType, $tokenValue] = $token;
                if ($this->color->hasTheme($tokenType)) {
                    $line .= $this->color->apply($tokenType, $tokenValue);
                } else {
                    $line .= $tokenValue;
                }
            }
            $lines[$lineCount] = $line;
        }

        return $lines;
    }

    /**
<<<<<<< HEAD
     * @param int|null $markLine
=======
     * @param  int|null  $markLine
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    private function lineNumbers(array $lines, $markLine = null): string
    {
        $lineStrlen = strlen((string) (array_key_last($lines) + 1));
        $lineStrlen = $lineStrlen < self::WIDTH ? self::WIDTH : $lineStrlen;
<<<<<<< HEAD
        $snippet    = '';
        $mark       = '  ' . $this->arrow . ' ';
=======
        $snippet = '';
        $mark = '  '.$this->arrow.' ';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        foreach ($lines as $i => $line) {
            $coloredLineNumber = $this->coloredLineNumber(self::LINE_NUMBER, $i, $lineStrlen);

            if (null !== $markLine) {
                $snippet .=
                    ($markLine === $i + 1
                        ? $this->color->apply(self::ACTUAL_LINE_MARK, $mark)
                        : self::NO_MARK
                    );

                $coloredLineNumber =
                    ($markLine === $i + 1 ?
                        $this->coloredLineNumber(self::MARKED_LINE_NUMBER, $i, $lineStrlen) :
                        $coloredLineNumber
                    );
            }
            $snippet .= $coloredLineNumber;

            $snippet .=
                $this->color->apply(self::LINE_NUMBER_DIVIDER, $this->delimiter);

<<<<<<< HEAD
            $snippet .= $line . PHP_EOL;
=======
            $snippet .= $line.PHP_EOL;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        return $snippet;
    }

    /**
<<<<<<< HEAD
     * @param string $style
     * @param int    $i
     * @param int    $lineStrlen
=======
     * @param  string  $style
     * @param  int  $i
     * @param  int  $lineStrlen
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    private function coloredLineNumber($style, $i, $lineStrlen): string
    {
        return $this->color->apply($style, str_pad((string) ($i + 1), $lineStrlen, ' ', STR_PAD_LEFT));
    }
}
