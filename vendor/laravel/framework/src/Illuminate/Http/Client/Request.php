<?php

namespace Illuminate\Http\Client;

use ArrayAccess;
use Illuminate\Support\Arr;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Support\Traits\Macroable;
use LogicException;

class Request implements ArrayAccess
{
    use Macroable;

    /**
     * The underlying PSR request.
     *
     * @var \Psr\Http\Message\RequestInterface
     */
    protected $request;

    /**
     * The decoded payload for the request.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new request instance.
     *
     * @param  \Psr\Http\Message\RequestInterface  $request
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function method()
    {
        return $this->request->getMethod();
    }

    /**
     * Get the URL of the request.
     *
     * @return string
     */
    public function url()
    {
        return (string) $this->request->getUri();
    }

    /**
     * Determine if the request has a given header.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return bool
     */
    public function hasHeader($key, $value = null)
    {
        if (is_null($value)) {
            return ! empty($this->request->getHeaders()[$key]);
        }

        $headers = $this->headers();

        if (! Arr::has($headers, $key)) {
            return false;
        }

        $value = is_array($value) ? $value : [$value];

        return empty(array_diff($value, $headers[$key]));
    }

    /**
     * Determine if the request has the given headers.
     *
     * @param  array|string  $headers
     * @return bool
     */
    public function hasHeaders($headers)
    {
        if (is_string($headers)) {
            $headers = [$headers => null];
        }

        foreach ($headers as $key => $value) {
            if (! $this->hasHeader($key, $value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the values for the header with the given name.
     *
     * @param  string  $key
     * @return array
     */
    public function header($key)
    {
        return Arr::get($this->headers(), $key, []);
    }

    /**
     * Get the request headers.
     *
     * @return array
     */
    public function headers()
    {
        return $this->request->getHeaders();
    }

    /**
     * Get the body of the request.
     *
     * @return string
     */
    public function body()
    {
        return (string) $this->request->getBody();
    }

    /**
     * Determine if the request contains the given file.
     *
     * @param  string  $name
     * @param  string|null  $value
     * @param  string|null  $filename
     * @return bool
     */
    public function hasFile($name, $value = null, $filename = null)
    {
        if (! $this->isMultipart()) {
            return false;
        }

        return collect($this->data)->reject(function ($file) use ($name, $value, $filename) {
            return $file['name'] != $name ||
                ($value && $file['contents'] != $value) ||
                ($filename && $file['filename'] != $filename);
        })->count() > 0;
    }

    /**
     * Get the request's data (form parameters or JSON).
     *
     * @return array
     */
    public function data()
    {
        if ($this->isForm()) {
            return $this->parameters();
        } elseif ($this->isJson()) {
            return $this->json();
        }

        return $this->data ?? [];
    }

    /**
     * Get the request's form parameters.
     *
     * @return array
     */
    protected function parameters()
    {
        if (! $this->data) {
            parse_str($this->body(), $parameters);

            $this->data = $parameters;
        }

        return $this->data;
    }

    /**
     * Get the JSON decoded body of the request.
     *
     * @return array
     */
    protected function json()
    {
        if (! $this->data) {
            $this->data = json_decode($this->body(), true);
        }

        return $this->data;
    }

    /**
     * Determine if the request is simple form data.
     *
     * @return bool
     */
    public function isForm()
    {
        return $this->hasHeader('Content-Type', 'application/x-www-form-urlencoded');
    }

    /**
     * Determine if the request is JSON.
     *
     * @return bool
     */
    public function isJson()
    {
        return $this->hasHeader('Content-Type') &&
<<<<<<< HEAD
               Str::contains($this->header('Content-Type')[0], 'json');
=======
               str_contains($this->header('Content-Type')[0], 'json');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Determine if the request is multipart.
     *
     * @return bool
     */
    public function isMultipart()
    {
        return $this->hasHeader('Content-Type') &&
<<<<<<< HEAD
               Str::contains($this->header('Content-Type')[0], 'multipart');
=======
               str_contains($this->header('Content-Type')[0], 'multipart');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Set the decoded data on the request.
     *
     * @param  array  $data
     * @return $this
     */
    public function withData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the underlying PSR compliant request instance.
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function toPsrRequest()
    {
        return $this->request;
    }

    /**
     * Determine if the given offset exists.
     *
     * @param  string  $offset
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
=======
    public function offsetExists($offset): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->data()[$offset]);
    }

    /**
     * Get the value for a given offset.
     *
     * @param  string  $offset
     * @return mixed
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
=======
    public function offsetGet($offset): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->data()[$offset];
    }

    /**
     * Set the value at the given offset.
     *
     * @param  string  $offset
     * @param  mixed  $value
     * @return void
     *
     * @throws \LogicException
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
=======
    public function offsetSet($offset, $value): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        throw new LogicException('Request data may not be mutated using array access.');
    }

    /**
     * Unset the value at the given offset.
     *
     * @param  string  $offset
     * @return void
     *
     * @throws \LogicException
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
=======
    public function offsetUnset($offset): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        throw new LogicException('Request data may not be mutated using array access.');
    }
}
