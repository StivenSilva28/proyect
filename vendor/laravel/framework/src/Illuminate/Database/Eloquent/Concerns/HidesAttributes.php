<?php

namespace Illuminate\Database\Eloquent\Concerns;

<<<<<<< HEAD
use Closure;

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
trait HidesAttributes
{
    /**
     * The attributes that should be hidden for serialization.
     *
<<<<<<< HEAD
     * @var array
=======
     * @var array<string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $hidden = [];

    /**
     * The attributes that should be visible in serialization.
     *
<<<<<<< HEAD
     * @var array
=======
     * @var array<string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $visible = [];

    /**
     * Get the hidden attributes for the model.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set the hidden attributes for the model.
     *
<<<<<<< HEAD
     * @param  array  $hidden
=======
     * @param  array<string>  $hidden
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function setHidden(array $hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get the visible attributes for the model.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set the visible attributes for the model.
     *
<<<<<<< HEAD
     * @param  array  $visible
=======
     * @param  array<string>  $visible
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function setVisible(array $visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Make the given, typically hidden, attributes visible.
     *
<<<<<<< HEAD
     * @param  array|string|null  $attributes
=======
     * @param  array<string>|string|null  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function makeVisible($attributes)
    {
        $attributes = is_array($attributes) ? $attributes : func_get_args();

        $this->hidden = array_diff($this->hidden, $attributes);

        if (! empty($this->visible)) {
            $this->visible = array_merge($this->visible, $attributes);
        }

        return $this;
    }

    /**
     * Make the given, typically hidden, attributes visible if the given truth test passes.
     *
<<<<<<< HEAD
     * @param  bool|Closure  $condition
     * @param  array|string|null  $attributes
=======
     * @param  bool|\Closure  $condition
     * @param  array<string>|string|null  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function makeVisibleIf($condition, $attributes)
    {
        return value($condition, $this) ? $this->makeVisible($attributes) : $this;
    }

    /**
     * Make the given, typically visible, attributes hidden.
     *
<<<<<<< HEAD
     * @param  array|string|null  $attributes
=======
     * @param  array<string>|string|null  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function makeHidden($attributes)
    {
        $this->hidden = array_merge(
            $this->hidden, is_array($attributes) ? $attributes : func_get_args()
        );

        return $this;
    }

    /**
     * Make the given, typically visible, attributes hidden if the given truth test passes.
     *
<<<<<<< HEAD
     * @param  bool|Closure  $condition
     * @param  array|string|null  $attributes
=======
     * @param  bool|\Closure  $condition
     * @param  array<string>|string|null  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function makeHiddenIf($condition, $attributes)
    {
        return value($condition, $this) ? $this->makeHidden($attributes) : $this;
    }
}
