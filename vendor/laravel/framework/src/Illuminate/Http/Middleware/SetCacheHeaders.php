<?php

namespace Illuminate\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
=======
use Symfony\Component\HttpFoundation\BinaryFileResponse;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

class SetCacheHeaders
{
    /**
     * Add cache related HTTP headers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $options
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \InvalidArgumentException
     */
    public function handle($request, Closure $next, $options = [])
    {
        $response = $next($request);

<<<<<<< HEAD
        if (! $request->isMethodCacheable() || ! $response->getContent()) {
=======
        if (! $request->isMethodCacheable() || (! $response->getContent() && ! $response instanceof BinaryFileResponse)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return $response;
        }

        if (is_string($options)) {
            $options = $this->parseOptions($options);
        }

        if (isset($options['etag']) && $options['etag'] === true) {
<<<<<<< HEAD
            $options['etag'] = md5($response->getContent());
=======
            $options['etag'] = $response->getEtag() ?? md5($response->getContent());
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        if (isset($options['last_modified'])) {
            if (is_numeric($options['last_modified'])) {
                $options['last_modified'] = Carbon::createFromTimestamp($options['last_modified']);
            } else {
                $options['last_modified'] = Carbon::parse($options['last_modified']);
            }
        }

        $response->setCache($options);
        $response->isNotModified($request);

        return $response;
    }

    /**
     * Parse the given header options.
     *
     * @param  string  $options
     * @return array
     */
    protected function parseOptions($options)
    {
        return collect(explode(';', rtrim($options, ';')))->mapWithKeys(function ($option) {
            $data = explode('=', $option, 2);

            return [$data[0] => $data[1] ?? true];
        })->all();
    }
}
