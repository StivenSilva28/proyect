<?php

declare(strict_types=1);

namespace NunoMaduro\Collision;

use NunoMaduro\Collision\Exceptions\InvalidStyleException;
use NunoMaduro\Collision\Exceptions\ShouldNotHappen;

/**
 * @internal
 */
final class ConsoleColor
{
    public const FOREGROUND = 38;
<<<<<<< HEAD
=======

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    public const BACKGROUND = 48;

    public const COLOR256_REGEXP = '~^(bg_)?color_(\d{1,3})$~';

    public const RESET_STYLE = 0;

    /** @var bool */
    private $isSupported;

    /** @var bool */
    private $forceStyle = false;

    /** @var array */
    private const STYLES = [
<<<<<<< HEAD
        'none'      => null,
        'bold'      => '1',
        'dark'      => '2',
        'italic'    => '3',
        'underline' => '4',
        'blink'     => '5',
        'reverse'   => '7',
        'concealed' => '8',

        'default'    => '39',
        'black'      => '30',
        'red'        => '31',
        'green'      => '32',
        'yellow'     => '33',
        'blue'       => '34',
        'magenta'    => '35',
        'cyan'       => '36',
        'light_gray' => '37',

        'dark_gray'     => '90',
        'light_red'     => '91',
        'light_green'   => '92',
        'light_yellow'  => '93',
        'light_blue'    => '94',
        'light_magenta' => '95',
        'light_cyan'    => '96',
        'white'         => '97',

        'bg_default'    => '49',
        'bg_black'      => '40',
        'bg_red'        => '41',
        'bg_green'      => '42',
        'bg_yellow'     => '43',
        'bg_blue'       => '44',
        'bg_magenta'    => '45',
        'bg_cyan'       => '46',
        'bg_light_gray' => '47',

        'bg_dark_gray'     => '100',
        'bg_light_red'     => '101',
        'bg_light_green'   => '102',
        'bg_light_yellow'  => '103',
        'bg_light_blue'    => '104',
        'bg_light_magenta' => '105',
        'bg_light_cyan'    => '106',
        'bg_white'         => '107',
=======
        'none' => null,
        'bold' => '1',
        'dark' => '2',
        'italic' => '3',
        'underline' => '4',
        'blink' => '5',
        'reverse' => '7',
        'concealed' => '8',

        'default' => '39',
        'black' => '30',
        'red' => '31',
        'green' => '32',
        'yellow' => '33',
        'blue' => '34',
        'magenta' => '35',
        'cyan' => '36',
        'light_gray' => '37',

        'dark_gray' => '90',
        'light_red' => '91',
        'light_green' => '92',
        'light_yellow' => '93',
        'light_blue' => '94',
        'light_magenta' => '95',
        'light_cyan' => '96',
        'white' => '97',

        'bg_default' => '49',
        'bg_black' => '40',
        'bg_red' => '41',
        'bg_green' => '42',
        'bg_yellow' => '43',
        'bg_blue' => '44',
        'bg_magenta' => '45',
        'bg_cyan' => '46',
        'bg_light_gray' => '47',

        'bg_dark_gray' => '100',
        'bg_light_red' => '101',
        'bg_light_green' => '102',
        'bg_light_yellow' => '103',
        'bg_light_blue' => '104',
        'bg_light_magenta' => '105',
        'bg_light_cyan' => '106',
        'bg_white' => '107',
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    ];

    /** @var array */
    private $themes = [];

    public function __construct()
    {
        $this->isSupported = $this->isSupported();
    }

    /**
<<<<<<< HEAD
     * @param string|array $style
     * @param string       $text
     *
=======
     * @param  string|array  $style
     * @param  string  $text
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return string
     *
     * @throws InvalidStyleException
     * @throws \InvalidArgumentException
     */
    public function apply($style, $text)
    {
<<<<<<< HEAD
        if (!$this->isStyleForced() && !$this->isSupported()) {
=======
        if (! $this->isStyleForced() && ! $this->isSupported()) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return $text;
        }

        if (is_string($style)) {
            $style = [$style];
        }
<<<<<<< HEAD
        if (!is_array($style)) {
=======
        if (! is_array($style)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            throw new \InvalidArgumentException('Style must be string or array.');
        }

        $sequences = [];

        foreach ($style as $s) {
            if (isset($this->themes[$s])) {
                $sequences = array_merge($sequences, $this->themeSequence($s));
            } elseif ($this->isValidStyle($s)) {
                $sequences[] = $this->styleSequence($s);
            } else {
                throw new ShouldNotHappen();
            }
        }

        $sequences = array_filter($sequences, function ($val) {
            return $val !== null;
        });

        if (empty($sequences)) {
            return $text;
        }

<<<<<<< HEAD
        return $this->escSequence(implode(';', $sequences)) . $text . $this->escSequence(self::RESET_STYLE);
    }

    /**
     * @param bool $forceStyle
=======
        return $this->escSequence(implode(';', $sequences)).$text.$this->escSequence(self::RESET_STYLE);
    }

    /**
     * @param  bool  $forceStyle
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function setForceStyle($forceStyle)
    {
        $this->forceStyle = $forceStyle;
    }

    /**
     * @return bool
     */
    public function isStyleForced()
    {
        return $this->forceStyle;
    }

    public function setThemes(array $themes)
    {
        $this->themes = [];
        foreach ($themes as $name => $styles) {
            $this->addTheme($name, $styles);
        }
    }

    /**
<<<<<<< HEAD
     * @param string       $name
     * @param array|string $styles
=======
     * @param  string  $name
     * @param  array|string  $styles
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function addTheme($name, $styles)
    {
        if (is_string($styles)) {
            $styles = [$styles];
        }
<<<<<<< HEAD
        if (!is_array($styles)) {
=======
        if (! is_array($styles)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            throw new \InvalidArgumentException('Style must be string or array.');
        }

        foreach ($styles as $style) {
<<<<<<< HEAD
            if (!$this->isValidStyle($style)) {
=======
            if (! $this->isValidStyle($style)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                throw new InvalidStyleException($style);
            }
        }

        $this->themes[$name] = $styles;
    }

    /**
     * @return array
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
<<<<<<< HEAD
     * @param string $name
     *
=======
     * @param  string  $name
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return bool
     */
    public function hasTheme($name)
    {
        return isset($this->themes[$name]);
    }

    /**
<<<<<<< HEAD
     * @param string $name
=======
     * @param  string  $name
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function removeTheme($name)
    {
        unset($this->themes[$name]);
    }

    /**
     * @return bool
     */
    public function isSupported()
    {
        // The COLLISION_FORCE_COLORS variable is for internal purposes only
        if (getenv('COLLISION_FORCE_COLORS') !== false) {
            return true;
        }

        if (DIRECTORY_SEPARATOR === '\\') {
            return getenv('ANSICON') !== false || getenv('ConEmuANSI') === 'ON';
        }

        return function_exists('posix_isatty') && @posix_isatty(STDOUT);
    }

    /**
     * @return bool
     */
    public function are256ColorsSupported()
    {
        if (DIRECTORY_SEPARATOR === '\\') {
            return function_exists('sapi_windows_vt100_support') && @sapi_windows_vt100_support(STDOUT);
        }

        return strpos(getenv('TERM'), '256color') !== false;
    }

    /**
     * @return array
     */
    public function getPossibleStyles()
    {
        return array_keys(self::STYLES);
    }

    /**
<<<<<<< HEAD
     * @param string $name
     *
=======
     * @param  string  $name
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return string[]
     */
    private function themeSequence($name)
    {
        $sequences = [];
        foreach ($this->themes[$name] as $style) {
            $sequences[] = $this->styleSequence($style);
        }

        return $sequences;
    }

    /**
<<<<<<< HEAD
     * @param string $style
     *
=======
     * @param  string  $style
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return string
     */
    private function styleSequence($style)
    {
        if (array_key_exists($style, self::STYLES)) {
            return self::STYLES[$style];
        }

<<<<<<< HEAD
        if (!$this->are256ColorsSupported()) {
=======
        if (! $this->are256ColorsSupported()) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return null;
        }

        preg_match(self::COLOR256_REGEXP, $style, $matches);

<<<<<<< HEAD
        $type  = $matches[1] === 'bg_' ? self::BACKGROUND : self::FOREGROUND;
=======
        $type = $matches[1] === 'bg_' ? self::BACKGROUND : self::FOREGROUND;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $value = $matches[2];

        return "$type;5;$value";
    }

    /**
<<<<<<< HEAD
     * @param string $style
     *
=======
     * @param  string  $style
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return bool
     */
    private function isValidStyle($style)
    {
        return array_key_exists($style, self::STYLES) || preg_match(self::COLOR256_REGEXP, $style);
    }

    /**
<<<<<<< HEAD
     * @param string|int $value
     *
=======
     * @param  string|int  $value
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return string
     */
    private function escSequence($value)
    {
        return "\033[{$value}m";
    }
}
