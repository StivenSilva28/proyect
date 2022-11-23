<?php

namespace Illuminate\Support\Facades;

use Illuminate\Contracts\Broadcasting\Factory as BroadcastingFactoryContract;

/**
<<<<<<< HEAD
 * @method static \Illuminate\Broadcasting\Broadcasters\Broadcaster channel(string $channel, callable|string  $callback, array $options = [])
 * @method static mixed auth(\Illuminate\Http\Request $request)
 * @method static \Illuminate\Contracts\Broadcasting\Broadcaster connection($name = null);
 * @method static void routes(array $attributes = null)
 * @method static \Illuminate\Broadcasting\BroadcastManager socket($request = null)
=======
 * @method static \Illuminate\Broadcasting\Broadcasters\Broadcaster channel(string $channel, callable|string $callback, array $options = [])
 * @method static \Illuminate\Broadcasting\BroadcastManager socket($request = null)
 * @method static \Illuminate\Contracts\Broadcasting\Broadcaster connection($name = null);
 * @method static mixed auth(\Illuminate\Http\Request $request)
 * @method static void resolveAuthenticatedUserUsing(\Closure $callback)
 * @method static void routes(array $attributes = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 *
 * @see \Illuminate\Contracts\Broadcasting\Factory
 */
class Broadcast extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BroadcastingFactoryContract::class;
    }
}
