<?php

namespace Illuminate\Database\Eloquent;

use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Support\Arr;

<<<<<<< HEAD
=======
/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ModelNotFoundException extends RecordsNotFoundException
{
    /**
     * Name of the affected Eloquent model.
     *
<<<<<<< HEAD
     * @var string
=======
     * @var class-string<TModel>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $model;

    /**
     * The affected model IDs.
     *
<<<<<<< HEAD
     * @var int|array
=======
     * @var array<int, int|string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $ids;

    /**
     * Set the affected Eloquent model and instance ids.
     *
<<<<<<< HEAD
     * @param  string  $model
     * @param  int|array  $ids
=======
     * @param  class-string<TModel>  $model
     * @param  array<int, int|string>|int|string  $ids
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function setModel($model, $ids = [])
    {
        $this->model = $model;
        $this->ids = Arr::wrap($ids);

        $this->message = "No query results for model [{$model}]";

        if (count($this->ids) > 0) {
            $this->message .= ' '.implode(', ', $this->ids);
        } else {
            $this->message .= '.';
        }

        return $this;
    }

    /**
     * Get the affected Eloquent model.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return class-string<TModel>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the affected Eloquent model IDs.
     *
<<<<<<< HEAD
     * @return int|array
=======
     * @return array<int, int|string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getIds()
    {
        return $this->ids;
    }
}
