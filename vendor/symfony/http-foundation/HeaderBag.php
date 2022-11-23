<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

/**
 * HeaderBag is a container for HTTP headers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @implements \IteratorAggregate<string, list<string|null>>
 */
class HeaderBag implements \IteratorAggregate, \Countable
{
    protected const UPPER = '_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected const LOWER = '-abcdefghijklmnopqrstuvwxyz';

    /**
     * @var array<string, list<string|null>>
     */
    protected $headers = [];
    protected $cacheControl = [];

    public function __construct(array $headers = [])
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
     * Returns the headers as a string.
<<<<<<< HEAD
     *
     * @return string
     */
    public function __toString()
=======
     */
    public function __toString(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$headers = $this->all()) {
            return '';
        }

        ksort($headers);
        $max = max(array_map('strlen', array_keys($headers))) + 1;
        $content = '';
        foreach ($headers as $name => $values) {
            $name = ucwords($name, '-');
            foreach ($values as $value) {
                $content .= sprintf("%-{$max}s %s\r\n", $name.':', $value);
            }
        }

        return $content;
    }

    /**
     * Returns the headers.
     *
     * @param string|null $key The name of the headers to return or null to get them all
     *
     * @return array<string, array<int, string|null>>|array<int, string|null>
     */
<<<<<<< HEAD
    public function all(string $key = null)
=======
    public function all(string $key = null): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (null !== $key) {
            return $this->headers[strtr($key, self::UPPER, self::LOWER)] ?? [];
        }

        return $this->headers;
    }

    /**
     * Returns the parameter keys.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function keys()
=======
    public function keys(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return array_keys($this->all());
    }

    /**
     * Replaces the current HTTP headers by a new set.
     */
    public function replace(array $headers = [])
    {
        $this->headers = [];
        $this->add($headers);
    }

    /**
     * Adds new headers the current HTTP headers set.
     */
    public function add(array $headers)
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
     * Returns the first header by name or the default one.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function get(string $key, string $default = null)
=======
     */
    public function get(string $key, string $default = null): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $headers = $this->all($key);

        if (!$headers) {
            return $default;
        }

        if (null === $headers[0]) {
            return null;
        }

        return (string) $headers[0];
    }

    /**
     * Sets a header by name.
     *
     * @param string|string[]|null $values  The value or an array of values
     * @param bool                 $replace Whether to replace the actual value or not (true by default)
     */
<<<<<<< HEAD
    public function set(string $key, $values, bool $replace = true)
=======
    public function set(string $key, string|array|null $values, bool $replace = true)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $key = strtr($key, self::UPPER, self::LOWER);

        if (\is_array($values)) {
            $values = array_values($values);

            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = $values;
            } else {
                $this->headers[$key] = array_merge($this->headers[$key], $values);
            }
        } else {
            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = [$values];
            } else {
                $this->headers[$key][] = $values;
            }
        }

        if ('cache-control' === $key) {
            $this->cacheControl = $this->parseCacheControl(implode(', ', $this->headers[$key]));
        }
    }

    /**
     * Returns true if the HTTP header is defined.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function has(string $key)
=======
     */
    public function has(string $key): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists(strtr($key, self::UPPER, self::LOWER), $this->all());
    }

    /**
     * Returns true if the given HTTP header contains the given value.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function contains(string $key, string $value)
=======
     */
    public function contains(string $key, string $value): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \in_array($value, $this->all($key));
    }

    /**
     * Removes a header.
     */
    public function remove(string $key)
    {
        $key = strtr($key, self::UPPER, self::LOWER);

        unset($this->headers[$key]);

        if ('cache-control' === $key) {
            $this->cacheControl = [];
        }
    }

    /**
     * Returns the HTTP header value converted to a date.
     *
<<<<<<< HEAD
     * @return \DateTimeInterface|null
     *
     * @throws \RuntimeException When the HTTP header is not parseable
     */
    public function getDate(string $key, \DateTime $default = null)
=======
     * @throws \RuntimeException When the HTTP header is not parseable
     */
    public function getDate(string $key, \DateTime $default = null): ?\DateTimeInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (null === $value = $this->get($key)) {
            return $default;
        }

        if (false === $date = \DateTime::createFromFormat(\DATE_RFC2822, $value)) {
            throw new \RuntimeException(sprintf('The "%s" HTTP header is not parseable (%s).', $key, $value));
        }

        return $date;
    }

    /**
     * Adds a custom Cache-Control directive.
<<<<<<< HEAD
     *
     * @param bool|string $value The Cache-Control directive value
     */
    public function addCacheControlDirective(string $key, $value = true)
=======
     */
    public function addCacheControlDirective(string $key, bool|string $value = true)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->cacheControl[$key] = $value;

        $this->set('Cache-Control', $this->getCacheControlHeader());
    }

    /**
     * Returns true if the Cache-Control directive is defined.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasCacheControlDirective(string $key)
=======
     */
    public function hasCacheControlDirective(string $key): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists($key, $this->cacheControl);
    }

    /**
     * Returns a Cache-Control directive value by name.
<<<<<<< HEAD
     *
     * @return bool|string|null
     */
    public function getCacheControlDirective(string $key)
=======
     */
    public function getCacheControlDirective(string $key): bool|string|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->cacheControl[$key] ?? null;
    }

    /**
     * Removes a Cache-Control directive.
     */
    public function removeCacheControlDirective(string $key)
    {
        unset($this->cacheControl[$key]);

        $this->set('Cache-Control', $this->getCacheControlHeader());
    }

    /**
     * Returns an iterator for headers.
     *
     * @return \ArrayIterator<string, list<string|null>>
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function getIterator()
=======
    public function getIterator(): \ArrayIterator
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new \ArrayIterator($this->headers);
    }

    /**
     * Returns the number of headers.
<<<<<<< HEAD
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
=======
     */
    public function count(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \count($this->headers);
    }

    protected function getCacheControlHeader()
    {
        ksort($this->cacheControl);

        return HeaderUtils::toString($this->cacheControl, ',');
    }

    /**
     * Parses a Cache-Control HTTP header.
<<<<<<< HEAD
     *
     * @return array
     */
    protected function parseCacheControl(string $header)
=======
     */
    protected function parseCacheControl(string $header): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $parts = HeaderUtils::split($header, ',=');

        return HeaderUtils::combine($parts);
    }
}
