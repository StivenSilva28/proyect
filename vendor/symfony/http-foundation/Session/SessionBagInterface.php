<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

/**
 * Session Bag store.
 *
 * @author Drak <drak@zikula.org>
 */
interface SessionBagInterface
{
    /**
     * Gets this bag's name.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getName();
=======
     */
    public function getName(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Initializes the Bag.
     */
    public function initialize(array &$array);

    /**
     * Gets the storage key for this bag.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getStorageKey();
=======
     */
    public function getStorageKey(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Clears out data from bag.
     *
     * @return mixed Whatever data was contained
     */
<<<<<<< HEAD
    public function clear();
=======
    public function clear(): mixed;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
