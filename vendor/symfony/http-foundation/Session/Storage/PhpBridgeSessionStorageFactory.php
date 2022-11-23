<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

use Symfony\Component\HttpFoundation\Request;
<<<<<<< HEAD
=======
use Symfony\Component\HttpFoundation\Session\Storage\Proxy\AbstractProxy;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

// Help opcache.preload discover always-needed symbols
class_exists(PhpBridgeSessionStorage::class);

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
class PhpBridgeSessionStorageFactory implements SessionStorageFactoryInterface
{
<<<<<<< HEAD
    private $handler;
    private $metaBag;
    private $secure;

    /**
     * @see PhpBridgeSessionStorage constructor.
     */
    public function __construct($handler = null, MetadataBag $metaBag = null, bool $secure = false)
=======
    private AbstractProxy|\SessionHandlerInterface|null $handler;
    private ?MetadataBag $metaBag;
    private bool $secure;

    public function __construct(AbstractProxy|\SessionHandlerInterface $handler = null, MetadataBag $metaBag = null, bool $secure = false)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->handler = $handler;
        $this->metaBag = $metaBag;
        $this->secure = $secure;
    }

    public function createStorage(?Request $request): SessionStorageInterface
    {
        $storage = new PhpBridgeSessionStorage($this->handler, $this->metaBag);
<<<<<<< HEAD
        if ($this->secure && $request && $request->isSecure()) {
=======
        if ($this->secure && $request?->isSecure()) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $storage->setOptions(['cookie_secure' => true]);
        }

        return $storage;
    }
}
