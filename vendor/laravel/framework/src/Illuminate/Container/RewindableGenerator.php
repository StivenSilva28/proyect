<?php

namespace Illuminate\Container;

use Countable;
use IteratorAggregate;
<<<<<<< HEAD
=======
use Traversable;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

class RewindableGenerator implements Countable, IteratorAggregate
{
    /**
     * The generator callback.
     *
     * @var callable
     */
    protected $generator;

    /**
     * The number of tagged services.
     *
     * @var callable|int
     */
    protected $count;

    /**
     * Create a new generator instance.
     *
     * @param  callable  $generator
     * @param  callable|int  $count
     * @return void
     */
    public function __construct(callable $generator, $count)
    {
        $this->count = $count;
        $this->generator = $generator;
    }

    /**
     * Get an iterator from the generator.
     *
<<<<<<< HEAD
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
=======
     * @return \Traversable
     */
    public function getIterator(): Traversable
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return ($this->generator)();
    }

    /**
     * Get the total number of tagged services.
     *
     * @return int
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function count()
=======
    public function count(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (is_callable($count = $this->count)) {
            $this->count = $count();
        }

        return $this->count;
    }
}
