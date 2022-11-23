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
 * RequestMatcher compares a pre-defined set of checks against a Request instance.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RequestMatcher implements RequestMatcherInterface
{
<<<<<<< HEAD
    /**
     * @var string|null
     */
    private $path;

    /**
     * @var string|null
     */
    private $host;

    /**
     * @var int|null
     */
    private $port;
=======
    private ?string $path = null;
    private ?string $host = null;
    private ?int $port = null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var string[]
     */
<<<<<<< HEAD
    private $methods = [];
=======
    private array $methods = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var string[]
     */
<<<<<<< HEAD
    private $ips = [];

    /**
     * @var array
     */
    private $attributes = [];
=======
    private array $ips = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var string[]
     */
<<<<<<< HEAD
    private $schemes = [];
=======
    private array $attributes = [];

    /**
     * @var string[]
     */
    private array $schemes = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string|string[]|null $methods
     * @param string|string[]|null $ips
     * @param string|string[]|null $schemes
     */
<<<<<<< HEAD
    public function __construct(string $path = null, string $host = null, $methods = null, $ips = null, array $attributes = [], $schemes = null, int $port = null)
=======
    public function __construct(string $path = null, string $host = null, string|array $methods = null, string|array $ips = null, array $attributes = [], string|array $schemes = null, int $port = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->matchPath($path);
        $this->matchHost($host);
        $this->matchMethod($methods);
        $this->matchIps($ips);
        $this->matchScheme($schemes);
        $this->matchPort($port);

        foreach ($attributes as $k => $v) {
            $this->matchAttribute($k, $v);
        }
    }

    /**
     * Adds a check for the HTTP scheme.
     *
     * @param string|string[]|null $scheme An HTTP scheme or an array of HTTP schemes
     */
<<<<<<< HEAD
    public function matchScheme($scheme)
=======
    public function matchScheme(string|array|null $scheme)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->schemes = null !== $scheme ? array_map('strtolower', (array) $scheme) : [];
    }

    /**
     * Adds a check for the URL host name.
     */
    public function matchHost(?string $regexp)
    {
        $this->host = $regexp;
    }

    /**
     * Adds a check for the the URL port.
     *
     * @param int|null $port The port number to connect to
     */
    public function matchPort(?int $port)
    {
        $this->port = $port;
    }

    /**
     * Adds a check for the URL path info.
     */
    public function matchPath(?string $regexp)
    {
        $this->path = $regexp;
    }

    /**
     * Adds a check for the client IP.
     *
     * @param string $ip A specific IP address or a range specified using IP/netmask like 192.168.1.0/24
     */
    public function matchIp(string $ip)
    {
        $this->matchIps($ip);
    }

    /**
     * Adds a check for the client IP.
     *
     * @param string|string[]|null $ips A specific IP address or a range specified using IP/netmask like 192.168.1.0/24
     */
<<<<<<< HEAD
    public function matchIps($ips)
=======
    public function matchIps(string|array|null $ips)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $ips = null !== $ips ? (array) $ips : [];

        $this->ips = array_reduce($ips, static function (array $ips, string $ip) {
            return array_merge($ips, preg_split('/\s*,\s*/', $ip));
        }, []);
    }

    /**
     * Adds a check for the HTTP method.
     *
     * @param string|string[]|null $method An HTTP method or an array of HTTP methods
     */
<<<<<<< HEAD
    public function matchMethod($method)
=======
    public function matchMethod(string|array|null $method)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->methods = null !== $method ? array_map('strtoupper', (array) $method) : [];
    }

    /**
     * Adds a check for request attribute.
     */
    public function matchAttribute(string $key, string $regexp)
    {
        $this->attributes[$key] = $regexp;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function matches(Request $request)
=======
    public function matches(Request $request): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->schemes && !\in_array($request->getScheme(), $this->schemes, true)) {
            return false;
        }

        if ($this->methods && !\in_array($request->getMethod(), $this->methods, true)) {
            return false;
        }

        foreach ($this->attributes as $key => $pattern) {
            $requestAttribute = $request->attributes->get($key);
            if (!\is_string($requestAttribute)) {
                return false;
            }
            if (!preg_match('{'.$pattern.'}', $requestAttribute)) {
                return false;
            }
        }

        if (null !== $this->path && !preg_match('{'.$this->path.'}', rawurldecode($request->getPathInfo()))) {
            return false;
        }

        if (null !== $this->host && !preg_match('{'.$this->host.'}i', $request->getHost())) {
            return false;
        }

        if (null !== $this->port && 0 < $this->port && $request->getPort() !== $this->port) {
            return false;
        }

        if (IpUtils::checkIp($request->getClientIp() ?? '', $this->ips)) {
            return true;
        }

        // Note to future implementors: add additional checks above the
        // foreach above or else your check might not be run!
        return 0 === \count($this->ips);
    }
}
