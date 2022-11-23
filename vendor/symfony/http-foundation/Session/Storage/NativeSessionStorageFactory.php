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
class_exists(NativeSessionStorage::class);

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
class NativeSessionStorageFactory implements SessionStorageFactoryInterface
{
<<<<<<< HEAD
    private $options;
    private $handler;
    private $metaBag;
    private $secure;
=======
    private array $options;
    private AbstractProxy|\SessionHandlerInterface|null $handler;
    private ?MetadataBag $metaBag;
    private bool $secure;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @see NativeSessionStorage constructor.
     */
<<<<<<< HEAD
    public function __construct(array $options = [], $handler = null, MetadataBag $metaBag = null, bool $secure = false)
=======
    public function __construct(array $options = [], AbstractProxy|\SessionHandlerInterface $handler = null, MetadataBag $metaBag = null, bool $secure = false)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options = $options;
        $this->handler = $handler;
        $this->metaBag = $metaBag;
        $this->secure = $secure;
    }

    public function createStorage(?Request $request): SessionStorageInterface
    {
        $storage = new NativeSessionStorage($this->options, $this->handler, $this->metaBag);
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
