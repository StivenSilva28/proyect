<?php

namespace Illuminate\Testing;

use ArrayAccess;
<<<<<<< HEAD
=======
use Closure;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Countable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Testing\Assert as PHPUnit;
use JsonSerializable;

class AssertableJsonString implements ArrayAccess, Countable
{
    /**
     * The original encoded json.
     *
<<<<<<< HEAD
     * @var \Illuminate\Contracts\Support\Jsonable|\JsonSerializable|array
=======
     * @var \Illuminate\Contracts\Support\Jsonable|\JsonSerializable|array|string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public $json;

    /**
     * The decoded json contents.
     *
     * @var array|null
     */
    protected $decoded;

    /**
     * Create a new assertable JSON string instance.
     *
     * @param  \Illuminate\Contracts\Support\Jsonable|\JsonSerializable|array|string  $jsonable
     * @return void
     */
    public function __construct($jsonable)
    {
        $this->json = $jsonable;

        if ($jsonable instanceof JsonSerializable) {
            $this->decoded = $jsonable->jsonSerialize();
        } elseif ($jsonable instanceof Jsonable) {
            $this->decoded = json_decode($jsonable->toJson(), true);
        } elseif (is_array($jsonable)) {
            $this->decoded = $jsonable;
        } else {
            $this->decoded = json_decode($jsonable, true);
        }
    }

    /**
     * Validate and return the decoded response JSON.
     *
     * @param  string|null  $key
     * @return mixed
     */
    public function json($key = null)
    {
        return data_get($this->decoded, $key);
    }

    /**
     * Assert that the response JSON has the expected count of items at the given key.
     *
     * @param  int  $count
     * @param  string|null  $key
     * @return $this
     */
    public function assertCount(int $count, $key = null)
    {
        if (! is_null($key)) {
            PHPUnit::assertCount(
                $count, data_get($this->decoded, $key),
                "Failed to assert that the response count matched the expected {$count}"
            );

            return $this;
        }

        PHPUnit::assertCount($count,
            $this->decoded,
            "Failed to assert that the response count matched the expected {$count}"
        );

        return $this;
    }

    /**
     * Assert that the response has the exact given JSON.
     *
     * @param  array  $data
     * @return $this
     */
    public function assertExact(array $data)
    {
        $actual = $this->reorderAssocKeys((array) $this->decoded);

        $expected = $this->reorderAssocKeys($data);

        PHPUnit::assertEquals(
            json_encode($expected, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            json_encode($actual, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        return $this;
    }

    /**
     * Assert that the response has the similar JSON as given.
     *
     * @param  array  $data
     * @return $this
     */
    public function assertSimilar(array $data)
    {
<<<<<<< HEAD
        $actual = json_encode(Arr::sortRecursive(
            (array) $this->decoded
        ));

        PHPUnit::assertEquals(json_encode(Arr::sortRecursive($data)), $actual);
=======
        $actual = json_encode(
            Arr::sortRecursive((array) $this->decoded),
            JSON_UNESCAPED_UNICODE
        );

        PHPUnit::assertEquals(json_encode(Arr::sortRecursive($data), JSON_UNESCAPED_UNICODE), $actual);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Assert that the response contains the given JSON fragment.
     *
     * @param  array  $data
     * @return $this
     */
    public function assertFragment(array $data)
    {
<<<<<<< HEAD
        $actual = json_encode(Arr::sortRecursive(
            (array) $this->decoded
        ));
=======
        $actual = json_encode(
            Arr::sortRecursive((array) $this->decoded),
            JSON_UNESCAPED_UNICODE
        );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        foreach (Arr::sortRecursive($data) as $key => $value) {
            $expected = $this->jsonSearchStrings($key, $value);

            PHPUnit::assertTrue(
                Str::contains($actual, $expected),
                'Unable to find JSON fragment: '.PHP_EOL.PHP_EOL.
<<<<<<< HEAD
                '['.json_encode([$key => $value]).']'.PHP_EOL.PHP_EOL.
=======
                '['.json_encode([$key => $value], JSON_UNESCAPED_UNICODE).']'.PHP_EOL.PHP_EOL.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                'within'.PHP_EOL.PHP_EOL.
                "[{$actual}]."
            );
        }

        return $this;
    }

    /**
     * Assert that the response does not contain the given JSON fragment.
     *
     * @param  array  $data
     * @param  bool  $exact
     * @return $this
     */
    public function assertMissing(array $data, $exact = false)
    {
        if ($exact) {
            return $this->assertMissingExact($data);
        }

<<<<<<< HEAD
        $actual = json_encode(Arr::sortRecursive(
            (array) $this->decoded
        ));
=======
        $actual = json_encode(
            Arr::sortRecursive((array) $this->decoded),
            JSON_UNESCAPED_UNICODE
        );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        foreach (Arr::sortRecursive($data) as $key => $value) {
            $unexpected = $this->jsonSearchStrings($key, $value);

            PHPUnit::assertFalse(
                Str::contains($actual, $unexpected),
                'Found unexpected JSON fragment: '.PHP_EOL.PHP_EOL.
<<<<<<< HEAD
                '['.json_encode([$key => $value]).']'.PHP_EOL.PHP_EOL.
=======
                '['.json_encode([$key => $value], JSON_UNESCAPED_UNICODE).']'.PHP_EOL.PHP_EOL.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                'within'.PHP_EOL.PHP_EOL.
                "[{$actual}]."
            );
        }

        return $this;
    }

    /**
     * Assert that the response does not contain the exact JSON fragment.
     *
     * @param  array  $data
     * @return $this
     */
    public function assertMissingExact(array $data)
    {
<<<<<<< HEAD
        $actual = json_encode(Arr::sortRecursive(
            (array) $this->decoded
        ));
=======
        $actual = json_encode(
            Arr::sortRecursive((array) $this->decoded),
            JSON_UNESCAPED_UNICODE
        );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        foreach (Arr::sortRecursive($data) as $key => $value) {
            $unexpected = $this->jsonSearchStrings($key, $value);

            if (! Str::contains($actual, $unexpected)) {
                return $this;
            }
        }

        PHPUnit::fail(
            'Found unexpected JSON fragment: '.PHP_EOL.PHP_EOL.
<<<<<<< HEAD
            '['.json_encode($data).']'.PHP_EOL.PHP_EOL.
=======
            '['.json_encode($data, JSON_UNESCAPED_UNICODE).']'.PHP_EOL.PHP_EOL.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            'within'.PHP_EOL.PHP_EOL.
            "[{$actual}]."
        );

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Assert that the response does not contain the given path.
     *
     * @param  string  $path
     * @return $this
     */
    public function assertMissingPath($path)
    {
        PHPUnit::assertFalse(Arr::has($this->json(), $path));

        return $this;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Assert that the expected value and type exists at the given path in the response.
     *
     * @param  string  $path
     * @param  mixed  $expect
     * @return $this
     */
    public function assertPath($path, $expect)
    {
<<<<<<< HEAD
        PHPUnit::assertSame($expect, $this->json($path));
=======
        if ($expect instanceof Closure) {
            PHPUnit::assertTrue($expect($this->json($path)));
        } else {
            PHPUnit::assertSame($expect, $this->json($path));
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Assert that the response has a given JSON structure.
     *
     * @param  array|null  $structure
     * @param  array|null  $responseData
     * @return $this
     */
    public function assertStructure(array $structure = null, $responseData = null)
    {
        if (is_null($structure)) {
            return $this->assertSimilar($this->decoded);
        }

        if (! is_null($responseData)) {
            return (new static($responseData))->assertStructure($structure);
        }

        foreach ($structure as $key => $value) {
            if (is_array($value) && $key === '*') {
                PHPUnit::assertIsArray($this->decoded);

                foreach ($this->decoded as $responseDataItem) {
                    $this->assertStructure($structure['*'], $responseDataItem);
                }
            } elseif (is_array($value)) {
                PHPUnit::assertArrayHasKey($key, $this->decoded);

                $this->assertStructure($structure[$key], $this->decoded[$key]);
            } else {
                PHPUnit::assertArrayHasKey($value, $this->decoded);
            }
        }

        return $this;
    }

    /**
     * Assert that the response is a superset of the given JSON.
     *
     * @param  array  $data
     * @param  bool  $strict
     * @return $this
     */
    public function assertSubset(array $data, $strict = false)
    {
        PHPUnit::assertArraySubset(
            $data, $this->decoded, $strict, $this->assertJsonMessage($data)
        );

        return $this;
    }

    /**
     * Reorder associative array keys to make it easy to compare arrays.
     *
     * @param  array  $data
     * @return array
     */
    protected function reorderAssocKeys(array $data)
    {
        $data = Arr::dot($data);
        ksort($data);

        $result = [];

        foreach ($data as $key => $value) {
            Arr::set($result, $key, $value);
        }

        return $result;
    }

    /**
     * Get the assertion message for assertJson.
     *
     * @param  array  $data
     * @return string
     */
    protected function assertJsonMessage(array $data)
    {
<<<<<<< HEAD
        $expected = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $actual = json_encode($this->decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
=======
        $expected = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $actual = json_encode($this->decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return 'Unable to find JSON: '.PHP_EOL.PHP_EOL.
            "[{$expected}]".PHP_EOL.PHP_EOL.
            'within response JSON:'.PHP_EOL.PHP_EOL.
            "[{$actual}].".PHP_EOL.PHP_EOL;
    }

    /**
     * Get the strings we need to search for when examining the JSON.
     *
     * @param  string  $key
     * @param  string  $value
     * @return array
     */
    protected function jsonSearchStrings($key, $value)
    {
<<<<<<< HEAD
        $needle = substr(json_encode([$key => $value]), 1, -1);
=======
        $needle = Str::substr(json_encode([$key => $value], JSON_UNESCAPED_UNICODE), 1, -1);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return [
            $needle.']',
            $needle.'}',
            $needle.',',
        ];
    }

    /**
     * Get the total number of items in the underlying JSON array.
     *
     * @return int
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function count()
=======
    public function count(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return count($this->decoded);
    }

    /**
     * Determine whether an offset exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
=======
    public function offsetExists($offset): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->decoded[$offset]);
    }

    /**
     * Get the value at the given offset.
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
        return $this->decoded[$offset];
    }

    /**
     * Set the value at the given offset.
     *
     * @param  string  $offset
     * @param  mixed  $value
     * @return void
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
=======
    public function offsetSet($offset, $value): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->decoded[$offset] = $value;
    }

    /**
     * Unset the value at the given offset.
     *
     * @param  string  $offset
     * @return void
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
=======
    public function offsetUnset($offset): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        unset($this->decoded[$offset]);
    }
}