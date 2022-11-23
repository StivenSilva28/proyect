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

/**
 * CompiledRoutes are returned by the RouteCompiler class.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class CompiledRoute implements \Serializable
{
<<<<<<< HEAD
    private $variables;
    private $tokens;
    private $staticPrefix;
    private $regex;
    private $pathVariables;
    private $hostVariables;
    private $hostRegex;
    private $hostTokens;
=======
    private array $variables;
    private array $tokens;
    private string $staticPrefix;
    private string $regex;
    private array $pathVariables;
    private array $hostVariables;
    private ?string $hostRegex;
    private array $hostTokens;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string      $staticPrefix  The static prefix of the compiled route
     * @param string      $regex         The regular expression to use to match this route
     * @param array       $tokens        An array of tokens to use to generate URL for this route
     * @param array       $pathVariables An array of path variables
     * @param string|null $hostRegex     Host regex
     * @param array       $hostTokens    Host tokens
     * @param array       $hostVariables An array of host variables
     * @param array       $variables     An array of variables (variables defined in the path and in the host patterns)
     */
    public function __construct(string $staticPrefix, string $regex, array $tokens, array $pathVariables, string $hostRegex = null, array $hostTokens = [], array $hostVariables = [], array $variables = [])
    {
        $this->staticPrefix = $staticPrefix;
        $this->regex = $regex;
        $this->tokens = $tokens;
        $this->pathVariables = $pathVariables;
        $this->hostRegex = $hostRegex;
        $this->hostTokens = $hostTokens;
        $this->hostVariables = $hostVariables;
        $this->variables = $variables;
    }

    public function __serialize(): array
    {
        return [
            'vars' => $this->variables,
            'path_prefix' => $this->staticPrefix,
            'path_regex' => $this->regex,
            'path_tokens' => $this->tokens,
            'path_vars' => $this->pathVariables,
            'host_regex' => $this->hostRegex,
            'host_tokens' => $this->hostTokens,
            'host_vars' => $this->hostVariables,
        ];
    }

    /**
     * @internal
     */
    final public function serialize(): string
    {
<<<<<<< HEAD
        return serialize($this->__serialize());
=======
        throw new \BadMethodCallException('Cannot serialize '.__CLASS__);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    public function __unserialize(array $data): void
    {
        $this->variables = $data['vars'];
        $this->staticPrefix = $data['path_prefix'];
        $this->regex = $data['path_regex'];
        $this->tokens = $data['path_tokens'];
        $this->pathVariables = $data['path_vars'];
        $this->hostRegex = $data['host_regex'];
        $this->hostTokens = $data['host_tokens'];
        $this->hostVariables = $data['host_vars'];
    }

    /**
     * @internal
     */
<<<<<<< HEAD
    final public function unserialize($serialized)
=======
    final public function unserialize(string $serialized)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->__unserialize(unserialize($serialized, ['allowed_classes' => false]));
    }

    /**
     * Returns the static prefix.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getStaticPrefix()
=======
     */
    public function getStaticPrefix(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->staticPrefix;
    }

    /**
     * Returns the regex.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getRegex()
=======
     */
    public function getRegex(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->regex;
    }

    /**
     * Returns the host regex.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getHostRegex()
=======
     */
    public function getHostRegex(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hostRegex;
    }

    /**
     * Returns the tokens.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getTokens()
=======
     */
    public function getTokens(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->tokens;
    }

    /**
     * Returns the host tokens.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getHostTokens()
=======
     */
    public function getHostTokens(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hostTokens;
    }

    /**
     * Returns the variables.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getVariables()
=======
     */
    public function getVariables(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->variables;
    }

    /**
     * Returns the path variables.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getPathVariables()
=======
     */
    public function getPathVariables(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->pathVariables;
    }

    /**
     * Returns the host variables.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getHostVariables()
=======
     */
    public function getHostVariables(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hostVariables;
    }
}
