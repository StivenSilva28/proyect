<?php

namespace Illuminate\Foundation\Testing;

use Faker\Factory;
use Faker\Generator;

trait WithFaker
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Setup up the Faker instance.
     *
     * @return void
     */
    protected function setUpFaker()
    {
        $this->faker = $this->makeFaker();
    }

    /**
     * Get the default Faker instance for a given locale.
     *
     * @param  string|null  $locale
     * @return \Faker\Generator
     */
    protected function faker($locale = null)
    {
        return is_null($locale) ? $this->faker : $this->makeFaker($locale);
    }

    /**
     * Create a Faker instance for the given locale.
     *
     * @param  string|null  $locale
     * @return \Faker\Generator
     */
    protected function makeFaker($locale = null)
    {
<<<<<<< HEAD
        $locale = $locale ?? config('app.faker_locale', Factory::DEFAULT_LOCALE);
=======
        $locale ??= config('app.faker_locale', Factory::DEFAULT_LOCALE);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        if (isset($this->app) && $this->app->bound(Generator::class)) {
            return $this->app->make(Generator::class, ['locale' => $locale]);
        }

        return Factory::create($locale);
    }
}
