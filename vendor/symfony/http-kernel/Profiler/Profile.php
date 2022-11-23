<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Profiler;

use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

/**
 * Profile.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Profile
{
<<<<<<< HEAD
    private $token;
=======
    private string $token;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var DataCollectorInterface[]
     */
<<<<<<< HEAD
    private $collectors = [];

    private $ip;
    private $method;
    private $url;
    private $time;
    private $statusCode;

    /**
     * @var Profile
     */
    private $parent;
=======
    private array $collectors = [];

    private ?string $ip = null;
    private ?string $method = null;
    private ?string $url = null;
    private ?int $time = null;
    private ?int $statusCode = null;
    private ?self $parent = null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var Profile[]
     */
<<<<<<< HEAD
    private $children = [];
=======
    private array $children = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * Gets the token.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getToken()
=======
     */
    public function getToken(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->token;
    }

    /**
     * Sets the parent token.
     */
    public function setParent(self $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Returns the parent profile.
<<<<<<< HEAD
     *
     * @return self|null
     */
    public function getParent()
=======
     */
    public function getParent(): ?self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->parent;
    }

    /**
     * Returns the parent token.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getParentToken()
    {
        return $this->parent ? $this->parent->getToken() : null;
=======
     */
    public function getParentToken(): ?string
    {
        return $this->parent?->getToken();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Returns the IP.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getIp()
=======
     */
    public function getIp(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->ip;
    }

    public function setIp(?string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * Returns the request method.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getMethod()
=======
     */
    public function getMethod(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->method;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * Returns the URL.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getUrl()
=======
     */
    public function getUrl(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->url;
    }

    public function setUrl(?string $url)
    {
        $this->url = $url;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
    public function getTime()
=======
    public function getTime(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->time ?? 0;
    }

    public function setTime(int $time)
    {
        $this->time = $time;
    }

    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }

<<<<<<< HEAD
    /**
     * @return int|null
     */
    public function getStatusCode()
=======
    public function getStatusCode(): ?int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->statusCode;
    }

    /**
     * Finds children profilers.
     *
     * @return self[]
     */
<<<<<<< HEAD
    public function getChildren()
=======
    public function getChildren(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->children;
    }

    /**
     * Sets children profiler.
     *
     * @param Profile[] $children
     */
    public function setChildren(array $children)
    {
        $this->children = [];
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * Adds the child token.
     */
    public function addChild(self $child)
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

    public function getChildByToken(string $token): ?self
    {
        foreach ($this->children as $child) {
            if ($token === $child->getToken()) {
                return $child;
            }
        }

        return null;
    }

    /**
     * Gets a Collector by name.
     *
<<<<<<< HEAD
     * @return DataCollectorInterface
     *
     * @throws \InvalidArgumentException if the collector does not exist
     */
    public function getCollector(string $name)
=======
     * @throws \InvalidArgumentException if the collector does not exist
     */
    public function getCollector(string $name): DataCollectorInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!isset($this->collectors[$name])) {
            throw new \InvalidArgumentException(sprintf('Collector "%s" does not exist.', $name));
        }

        return $this->collectors[$name];
    }

    /**
     * Gets the Collectors associated with this profile.
     *
     * @return DataCollectorInterface[]
     */
<<<<<<< HEAD
    public function getCollectors()
=======
    public function getCollectors(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->collectors;
    }

    /**
     * Sets the Collectors associated with this profile.
     *
     * @param DataCollectorInterface[] $collectors
     */
    public function setCollectors(array $collectors)
    {
        $this->collectors = [];
        foreach ($collectors as $collector) {
            $this->addCollector($collector);
        }
    }

    /**
     * Adds a Collector.
     */
    public function addCollector(DataCollectorInterface $collector)
    {
        $this->collectors[$collector->getName()] = $collector;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    public function hasCollector(string $name)
=======
    public function hasCollector(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->collectors[$name]);
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function __sleep()
=======
    public function __sleep(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return ['token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time', 'statusCode'];
    }
}
