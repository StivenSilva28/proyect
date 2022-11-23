<?php

namespace Illuminate\Http\Concerns;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
trait InteractsWithFlashData
{
    /**
     * Retrieve an old input item.
     *
     * @param  string|null  $key
<<<<<<< HEAD
     * @param  string|array|null  $default
=======
     * @param  \Illuminate\Database\Eloquent\Model|string|array|null  $default
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return string|array|null
     */
    public function old($key = null, $default = null)
    {
<<<<<<< HEAD
=======
        $default = $default instanceof Model ? $default->getAttribute($key) : $default;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        return $this->hasSession() ? $this->session()->getOldInput($key, $default) : $default;
    }

    /**
     * Flash the input for the current request to the session.
     *
     * @return void
     */
    public function flash()
    {
        $this->session()->flashInput($this->input());
    }

    /**
     * Flash only some of the input to the session.
     *
     * @param  array|mixed  $keys
     * @return void
     */
    public function flashOnly($keys)
    {
        $this->session()->flashInput(
            $this->only(is_array($keys) ? $keys : func_get_args())
        );
    }

    /**
     * Flash only some of the input to the session.
     *
     * @param  array|mixed  $keys
     * @return void
     */
    public function flashExcept($keys)
    {
        $this->session()->flashInput(
            $this->except(is_array($keys) ? $keys : func_get_args())
        );
    }

    /**
     * Flush all of the old input from the session.
     *
     * @return void
     */
    public function flush()
    {
        $this->session()->flashInput([]);
    }
}
