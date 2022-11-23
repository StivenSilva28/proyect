<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This code is partially based on the Rack-Cache library by Ryan Tomayko,
 * which is released under the MIT license.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\HttpCache;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface implemented by HTTP cache stores.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface StoreInterface
{
    /**
     * Locates a cached Response for the Request provided.
<<<<<<< HEAD
     *
     * @return Response|null
     */
    public function lookup(Request $request);
=======
     */
    public function lookup(Request $request): ?Response;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Writes a cache entry to the store for the given Request and Response.
     *
     * Existing entries are read and any that match the response are removed. This
     * method calls write with the new list of cache entries.
     *
     * @return string The key under which the response is stored
     */
<<<<<<< HEAD
    public function write(Request $request, Response $response);
=======
    public function write(Request $request, Response $response): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Invalidates all cache entries that match the request.
     */
    public function invalidate(Request $request);

    /**
     * Locks the cache for a given Request.
     *
     * @return bool|string true if the lock is acquired, the path to the current lock otherwise
     */
<<<<<<< HEAD
    public function lock(Request $request);
=======
    public function lock(Request $request): bool|string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Releases the lock for the given Request.
     *
     * @return bool False if the lock file does not exist or cannot be unlocked, true otherwise
     */
<<<<<<< HEAD
    public function unlock(Request $request);
=======
    public function unlock(Request $request): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns whether or not a lock exists.
     *
     * @return bool true if lock exists, false otherwise
     */
<<<<<<< HEAD
    public function isLocked(Request $request);
=======
    public function isLocked(Request $request): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Purges data for the given URL.
     *
     * @return bool true if the URL exists and has been purged, false otherwise
     */
<<<<<<< HEAD
    public function purge(string $url);
=======
    public function purge(string $url): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Cleanups storage.
     */
    public function cleanup();
}
