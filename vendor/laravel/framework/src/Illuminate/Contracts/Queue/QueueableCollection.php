<?php

namespace Illuminate\Contracts\Queue;

interface QueueableCollection
{
    /**
     * Get the type of the entities being queued.
     *
     * @return string|null
     */
    public function getQueueableClass();

    /**
     * Get the identifiers for all of the entities.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<int, mixed>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getQueueableIds();

    /**
     * Get the relationships of the entities being queued.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<int, string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getQueueableRelations();

    /**
     * Get the connection of the entities being queued.
     *
     * @return string|null
     */
    public function getQueueableConnection();
}
