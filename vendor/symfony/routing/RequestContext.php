<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing;

use Symfony\Component\HttpFoundation\Request;

/**
 * Holds information about the current request.
 *
 * This class implements a fluent interface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Tobias Schultze <http://tobion.de>
 */
class RequestContext
{
<<<<<<< HEAD
    private $baseUrl;
    private $pathInfo;
    private $method;
    private $host;
    private $scheme;
    private $httpPort;
    private $httpsPort;
    private $queryString;
    private $parameters = [];
=======
    private string $baseUrl;
    private string $pathInfo;
    private string $method;
    private string $host;
    private string $scheme;
    private int $httpPort;
    private int $httpsPort;
    private string $queryString;
    private array $parameters = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $baseUrl = '', string $method = 'GET', string $host = 'localhost', string $scheme = 'http', int $httpPort = 80, int $httpsPort = 443, string $path = '/', string $queryString = '')
    {
        $this->setBaseUrl($baseUrl);
        $this->setMethod($method);
        $this->setHost($host);
        $this->setScheme($scheme);
        $this->setHttpPort($httpPort);
        $this->setHttpsPort($httpsPort);
        $this->setPathInfo($path);
        $this->setQueryString($queryString);
    }

    public static function fromUri(string $uri, string $host = 'localhost', string $scheme = 'http', int $httpPort = 80, int $httpsPort = 443): self
    {
        $uri = parse_url($uri);
        $scheme = $uri['scheme'] ?? $scheme;
        $host = $uri['host'] ?? $host;

        if (isset($uri['port'])) {
            if ('http' === $scheme) {
                $httpPort = $uri['port'];
            } elseif ('https' === $scheme) {
                $httpsPort = $uri['port'];
            }
        }

        return new self($uri['path'] ?? '', 'GET', $host, $scheme, $httpPort, $httpsPort);
    }

    /**
     * Updates the RequestContext information based on a HttpFoundation Request.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function fromRequest(Request $request)
=======
    public function fromRequest(Request $request): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->setBaseUrl($request->getBaseUrl());
        $this->setPathInfo($request->getPathInfo());
        $this->setMethod($request->getMethod());
        $this->setHost($request->getHost());
        $this->setScheme($request->getScheme());
        $this->setHttpPort($request->isSecure() || null === $request->getPort() ? $this->httpPort : $request->getPort());
        $this->setHttpsPort($request->isSecure() && null !== $request->getPort() ? $request->getPort() : $this->httpsPort);
        $this->setQueryString($request->server->get('QUERY_STRING', ''));

        return $this;
    }

    /**
     * Gets the base URL.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getBaseUrl()
=======
     */
    public function getBaseUrl(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->baseUrl;
    }

    /**
     * Sets the base URL.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setBaseUrl(string $baseUrl)
=======
    public function setBaseUrl(string $baseUrl): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->baseUrl = rtrim($baseUrl, '/');

        return $this;
    }

    /**
     * Gets the path info.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getPathInfo()
=======
     */
    public function getPathInfo(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->pathInfo;
    }

    /**
     * Sets the path info.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setPathInfo(string $pathInfo)
=======
    public function setPathInfo(string $pathInfo): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->pathInfo = $pathInfo;

        return $this;
    }

    /**
     * Gets the HTTP method.
     *
     * The method is always an uppercased string.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getMethod()
=======
     */
    public function getMethod(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->method;
    }

    /**
     * Sets the HTTP method.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setMethod(string $method)
=======
    public function setMethod(string $method): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->method = strtoupper($method);

        return $this;
    }

    /**
     * Gets the HTTP host.
     *
     * The host is always lowercased because it must be treated case-insensitive.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getHost()
=======
     */
    public function getHost(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->host;
    }

    /**
     * Sets the HTTP host.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHost(string $host)
=======
    public function setHost(string $host): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->host = strtolower($host);

        return $this;
    }

    /**
     * Gets the HTTP scheme.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getScheme()
=======
     */
    public function getScheme(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->scheme;
    }

    /**
     * Sets the HTTP scheme.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setScheme(string $scheme)
=======
    public function setScheme(string $scheme): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->scheme = strtolower($scheme);

        return $this;
    }

    /**
     * Gets the HTTP port.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getHttpPort()
=======
     */
    public function getHttpPort(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->httpPort;
    }

    /**
     * Sets the HTTP port.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHttpPort(int $httpPort)
=======
    public function setHttpPort(int $httpPort): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->httpPort = $httpPort;

        return $this;
    }

    /**
     * Gets the HTTPS port.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getHttpsPort()
=======
     */
    public function getHttpsPort(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->httpsPort;
    }

    /**
     * Sets the HTTPS port.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHttpsPort(int $httpsPort)
=======
    public function setHttpsPort(int $httpsPort): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->httpsPort = $httpsPort;

        return $this;
    }

    /**
     * Gets the query string without the "?".
<<<<<<< HEAD
     *
     * @return string
     */
    public function getQueryString()
=======
     */
    public function getQueryString(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->queryString;
    }

    /**
     * Sets the query string.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setQueryString(?string $queryString)
=======
    public function setQueryString(?string $queryString): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        // string cast to be fault-tolerant, accepting null
        $this->queryString = (string) $queryString;

        return $this;
    }

    /**
     * Returns the parameters.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getParameters()
=======
     */
    public function getParameters(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->parameters;
    }

    /**
     * Sets the parameters.
     *
     * @param array $parameters The parameters
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setParameters(array $parameters)
=======
    public function setParameters(array $parameters): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Gets a parameter value.
<<<<<<< HEAD
     *
     * @return mixed
     */
    public function getParameter(string $name)
=======
     */
    public function getParameter(string $name): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->parameters[$name] ?? null;
    }

    /**
     * Checks if a parameter value is set for the given parameter.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasParameter(string $name)
=======
     */
    public function hasParameter(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists($name, $this->parameters);
    }

    /**
     * Sets a parameter value.
     *
<<<<<<< HEAD
     * @param mixed $parameter The parameter value
     *
     * @return $this
     */
    public function setParameter(string $name, $parameter)
=======
     * @return $this
     */
    public function setParameter(string $name, mixed $parameter): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->parameters[$name] = $parameter;

        return $this;
    }

    public function isSecure(): bool
    {
        return 'https' === $this->scheme;
    }
}
