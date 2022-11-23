<?php

namespace Illuminate\Cookie\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use Illuminate\Cookie\CookieValuePrefix;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EncryptCookies
{
    /**
     * The encrypter instance.
     *
     * @var \Illuminate\Contracts\Encryption\Encrypter
     */
    protected $encrypter;

    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [];

    /**
     * Indicates if cookies should be serialized.
     *
     * @var bool
     */
    protected static $serialize = false;

    /**
     * Create a new CookieGuard instance.
     *
     * @param  \Illuminate\Contracts\Encryption\Encrypter  $encrypter
     * @return void
     */
    public function __construct(EncrypterContract $encrypter)
    {
        $this->encrypter = $encrypter;
    }

    /**
     * Disable encryption for the given cookie name(s).
     *
     * @param  string|array  $name
     * @return void
     */
    public function disableFor($name)
    {
        $this->except = array_merge($this->except, (array) $name);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        return $this->encrypt($next($this->decrypt($request)));
    }

    /**
     * Decrypt the cookies on the request.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function decrypt(Request $request)
    {
        foreach ($request->cookies as $key => $cookie) {
<<<<<<< HEAD
            if ($this->isDisabled($key) || is_array($cookie)) {
=======
            if ($this->isDisabled($key)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                continue;
            }

            try {
                $value = $this->decryptCookie($key, $cookie);

<<<<<<< HEAD
                $hasValidPrefix = strpos($value, CookieValuePrefix::create($key, $this->encrypter->getKey())) === 0;

                $request->cookies->set(
                    $key, $hasValidPrefix ? CookieValuePrefix::remove($value) : null
                );
=======
                $request->cookies->set($key, $this->validateValue($key, $value));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            } catch (DecryptException $e) {
                $request->cookies->set($key, null);
            }
        }

        return $request;
    }

    /**
<<<<<<< HEAD
=======
     * Validate and remove the cookie value prefix from the value.
     *
     * @param  string  $key
     * @param  string  $value
     * @return string|array|null
     */
    protected function validateValue(string $key, $value)
    {
        return is_array($value)
                    ? $this->validateArray($key, $value)
                    : CookieValuePrefix::validate($key, $value, $this->encrypter->getKey());
    }

    /**
     * Validate and remove the cookie value prefix from all values of an array.
     *
     * @param  string  $key
     * @param  array  $value
     * @return array
     */
    protected function validateArray(string $key, array $value)
    {
        $validated = [];

        foreach ($value as $index => $subValue) {
            $validated[$index] = $this->validateValue("{$key}[{$index}]", $subValue);
        }

        return $validated;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Decrypt the given cookie and return the value.
     *
     * @param  string  $name
     * @param  string|array  $cookie
     * @return string|array
     */
    protected function decryptCookie($name, $cookie)
    {
        return is_array($cookie)
                        ? $this->decryptArray($cookie)
                        : $this->encrypter->decrypt($cookie, static::serialized($name));
    }

    /**
     * Decrypt an array based cookie.
     *
     * @param  array  $cookie
     * @return array
     */
    protected function decryptArray(array $cookie)
    {
        $decrypted = [];

        foreach ($cookie as $key => $value) {
            if (is_string($value)) {
                $decrypted[$key] = $this->encrypter->decrypt($value, static::serialized($key));
            }
<<<<<<< HEAD
=======

            if (is_array($value)) {
                $decrypted[$key] = $this->decryptArray($value);
            }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        return $decrypted;
    }

    /**
     * Encrypt the cookies on an outgoing response.
     *
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function encrypt(Response $response)
    {
        foreach ($response->headers->getCookies() as $cookie) {
            if ($this->isDisabled($cookie->getName())) {
                continue;
            }

            $response->headers->setCookie($this->duplicate(
                $cookie,
                $this->encrypter->encrypt(
                    CookieValuePrefix::create($cookie->getName(), $this->encrypter->getKey()).$cookie->getValue(),
                    static::serialized($cookie->getName())
                )
            ));
        }

        return $response;
    }

    /**
     * Duplicate a cookie with a new value.
     *
     * @param  \Symfony\Component\HttpFoundation\Cookie  $cookie
     * @param  mixed  $value
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    protected function duplicate(Cookie $cookie, $value)
    {
        return new Cookie(
            $cookie->getName(), $value, $cookie->getExpiresTime(),
            $cookie->getPath(), $cookie->getDomain(), $cookie->isSecure(),
            $cookie->isHttpOnly(), $cookie->isRaw(), $cookie->getSameSite()
        );
    }

    /**
     * Determine whether encryption has been disabled for the given cookie.
     *
     * @param  string  $name
     * @return bool
     */
    public function isDisabled($name)
    {
        return in_array($name, $this->except);
    }

    /**
     * Determine if the cookie contents should be serialized.
     *
     * @param  string  $name
     * @return bool
     */
    public static function serialized($name)
    {
        return static::$serialize;
    }
}