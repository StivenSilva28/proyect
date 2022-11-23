<?php

declare(strict_types=1);

namespace NunoMaduro\Collision\Contracts;

<<<<<<< HEAD
use Facade\IgnitionContracts\Solution;
=======
use Spatie\Ignition\Contracts\Solution;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Throwable;

/**
 * @internal
 */
interface SolutionsRepository
{
    /**
     * Gets the solutions from the given `$throwable`.
     *
     * @return array<int, Solution>
     */
    public function getFromThrowable(Throwable $throwable): array;
}
