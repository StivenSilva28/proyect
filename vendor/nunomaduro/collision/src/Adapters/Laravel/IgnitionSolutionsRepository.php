<?php

declare(strict_types=1);

namespace NunoMaduro\Collision\Adapters\Laravel;

<<<<<<< HEAD
use Facade\IgnitionContracts\SolutionProviderRepository;
use NunoMaduro\Collision\Contracts\SolutionsRepository;
=======
use NunoMaduro\Collision\Contracts\SolutionsRepository;
use Spatie\Ignition\Contracts\SolutionProviderRepository;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Throwable;

/**
 * @internal
 */
final class IgnitionSolutionsRepository implements SolutionsRepository
{
    /**
     * Holds an instance of ignition solutions provider repository.
     *
<<<<<<< HEAD
     * @var \Facade\IgnitionContracts\SolutionProviderRepository
=======
     * @var \Spatie\Ignition\Contracts\SolutionProviderRepository
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $solutionProviderRepository;

    /**
     * IgnitionSolutionsRepository constructor.
     */
    public function __construct(SolutionProviderRepository $solutionProviderRepository)
    {
        $this->solutionProviderRepository = $solutionProviderRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getFromThrowable(Throwable $throwable): array
    {
        return $this->solutionProviderRepository->getSolutionsForThrowable($throwable);
    }
}
