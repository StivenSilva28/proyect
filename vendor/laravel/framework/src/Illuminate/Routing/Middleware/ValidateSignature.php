<?php

namespace Illuminate\Routing\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class ValidateSignature
{
    /**
<<<<<<< HEAD
=======
     * The names of the parameters that should be ignored.
     *
     * @var array<int, string>
     */
    protected $ignore = [
        //
    ];

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $relative
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Routing\Exceptions\InvalidSignatureException
     */
    public function handle($request, Closure $next, $relative = null)
    {
<<<<<<< HEAD
        if ($request->hasValidSignature($relative !== 'relative')) {
=======
        $ignore = property_exists($this, 'except') ? $this->except : $this->ignore;

        if ($request->hasValidSignatureWhileIgnoring($ignore, $relative !== 'relative')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return $next($request);
        }

        throw new InvalidSignatureException;
    }
}
