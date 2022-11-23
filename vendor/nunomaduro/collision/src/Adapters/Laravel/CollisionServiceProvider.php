<?php

declare(strict_types=1);

namespace NunoMaduro\Collision\Adapters\Laravel;

use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;
use Illuminate\Support\ServiceProvider;
use NunoMaduro\Collision\Adapters\Laravel\Commands\TestCommand;
use NunoMaduro\Collision\Contracts\Provider as ProviderContract;
use NunoMaduro\Collision\Handler;
use NunoMaduro\Collision\Provider;
use NunoMaduro\Collision\SolutionsRepositories\NullSolutionsRepository;
use NunoMaduro\Collision\Writer;

/**
 * @internal
 *
 * @final
 */
class CollisionServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boots application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            TestCommand::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
<<<<<<< HEAD
        if ($this->app->runningInConsole() && !$this->app->runningUnitTests()) {
            $this->app->bind(ProviderContract::class, function () {
                if ($this->app->has(\Facade\IgnitionContracts\SolutionProviderRepository::class)) {
                    $solutionsRepository = new IgnitionSolutionsRepository(
                        $this->app->get(\Facade\IgnitionContracts\SolutionProviderRepository::class)
                    );
=======
        if ($this->app->runningInConsole() && ! $this->app->runningUnitTests()) {
            $this->app->bind(ProviderContract::class, function () {
                // @phpstan-ignore-next-line
                if ($this->app->has(\Spatie\Ignition\Contracts\SolutionProviderRepository::class)) {
                    /** @var \Spatie\Ignition\Contracts\SolutionProviderRepository $solutionProviderRepository */
                    $solutionProviderRepository = $this->app->get(\Spatie\Ignition\Contracts\SolutionProviderRepository::class);

                    $solutionsRepository = new IgnitionSolutionsRepository($solutionProviderRepository);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                } else {
                    $solutionsRepository = new NullSolutionsRepository();
                }

                $writer = new Writer($solutionsRepository);
                $handler = new Handler($writer);

                return new Provider(null, $handler);
            });

<<<<<<< HEAD
=======
            /** @var \Illuminate\Contracts\Debug\ExceptionHandler $appExceptionHandler */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $appExceptionHandler = $this->app->make(ExceptionHandlerContract::class);

            $this->app->singleton(
                ExceptionHandlerContract::class,
                function ($app) use ($appExceptionHandler) {
                    return new ExceptionHandler($app, $appExceptionHandler);
                }
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [ProviderContract::class];
    }
}
