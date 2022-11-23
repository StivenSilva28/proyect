<?php

declare(strict_types=1);

namespace NunoMaduro\Collision\Adapters\Phpunit;

use NunoMaduro\Collision\Contracts\Adapters\Phpunit\HasPrintableTestCaseName;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @internal
 */
final class TestResult
{
<<<<<<< HEAD
    public const FAIL       = 'failed';
    public const SKIPPED    = 'skipped';
    public const INCOMPLETE = 'incompleted';
    public const RISKY      = 'risked';
    public const WARN       = 'warnings';
    public const RUNS       = 'pending';
    public const PASS       = 'passed';
=======
    public const FAIL = 'failed';

    public const SKIPPED = 'skipped';

    public const INCOMPLETE = 'incomplete';

    public const RISKY = 'risky';

    public const WARN = 'warnings';

    public const RUNS = 'pending';

    public const PASS = 'passed';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @readonly
     *
     * @var string
     */
    public $testCaseName;

    /**
     * @readonly
     *
     * @var string
     */
    public $description;

    /**
     * @readonly
     *
     * @var string
     */
    public $type;

    /**
     * @readonly
     *
     * @var string
     */
    public $icon;

    /**
     * @readonly
     *
     * @var string
     */
    public $color;

    /**
     * @readonly
     *
     * @var Throwable|null
     */
    public $throwable;

    /**
     * @readonly
     *
     * @var string
     */
    public $warning = '';

    /**
     * Test constructor.
     */
    private function __construct(string $testCaseName, string $description, string $type, string $icon, string $color, Throwable $throwable = null)
    {
        $this->testCaseName = $testCaseName;
<<<<<<< HEAD
        $this->description  = $description;
        $this->type         = $type;
        $this->icon         = $icon;
        $this->color        = $color;
        $this->throwable    = $throwable;
=======
        $this->description = $description;
        $this->type = $type;
        $this->icon = $icon;
        $this->color = $color;
        $this->throwable = $throwable;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        $asWarning = $this->type === TestResult::WARN
             || $this->type === TestResult::RISKY
             || $this->type === TestResult::SKIPPED
             || $this->type === TestResult::INCOMPLETE;

        if ($throwable instanceof Throwable && $asWarning) {
<<<<<<< HEAD
            $this->warning     = trim((string) preg_replace("/\r|\n/", ' ', $throwable->getMessage()));
=======
            $this->warning = trim((string) preg_replace("/\r|\n/", ' ', $throwable->getMessage()));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }

    /**
     * Creates a new test from the given test case.
     */
    public static function fromTestCase(TestCase $testCase, string $type, Throwable $throwable = null): self
    {
        $testCaseName = State::getPrintableTestCaseName($testCase);

        $description = self::makeDescription($testCase);

        $icon = self::makeIcon($type);

        $color = self::makeColor($type);

        return new self($testCaseName, $description, $type, $icon, $color, $throwable);
    }

    /**
     * Get the test case description.
     */
    public static function makeDescription(TestCase $testCase): string
    {
        $name = $testCase->getName(false);

        if ($testCase instanceof HasPrintableTestCaseName) {
            return $name;
        }

        // First, lets replace underscore by spaces.
        $name = str_replace('_', ' ', $name);

        // Then, replace upper cases by spaces.
        $name = (string) preg_replace('/([A-Z])/', ' $1', $name);

        // Finally, if it starts with `test`, we remove it.
        $name = (string) preg_replace('/^test/', '', $name);

        // Removes spaces
        $name = trim($name);

        // Lower case everything
        $name = mb_strtolower($name);

        // Add the dataset name if it has one
        if ($dataName = $testCase->dataName()) {
            if (is_int($dataName)) {
                $name .= sprintf(' with data set #%d', $dataName);
            } else {
                $name .= sprintf(' with data set "%s"', $dataName);
            }
        }

        return $name;
    }

    /**
     * Get the test case icon.
     */
    public static function makeIcon(string $type): string
    {
        switch ($type) {
            case self::FAIL:
                return '⨯';
            case self::SKIPPED:
                return '-';
            case self::RISKY:
                return '!';
            case self::INCOMPLETE:
                return '…';
            case self::WARN:
                return '!';
            case self::RUNS:
                return '•';
            default:
                return '✓';
        }
    }

    /**
     * Get the test case color.
     */
    public static function makeColor(string $type): string
    {
        switch ($type) {
            case self::FAIL:
                return 'red';
            case self::SKIPPED:
            case self::INCOMPLETE:
            case self::RISKY:
            case self::WARN:
            case self::RUNS:
                return 'yellow';
            default:
                return 'green';
        }
    }
}
