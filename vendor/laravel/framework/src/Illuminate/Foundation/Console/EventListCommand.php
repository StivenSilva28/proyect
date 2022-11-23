<?php

namespace Illuminate\Foundation\Console;

<<<<<<< HEAD
use Illuminate\Console\Command;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Support\Str;

=======
use Closure;
use Illuminate\Console\Command;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use ReflectionFunction;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'event:list')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class EventListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:list {--event= : Filter the events by name}';

    /**
<<<<<<< HEAD
=======
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'event:list';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = "List the application's events and listeners";

    /**
<<<<<<< HEAD
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $events = $this->getEvents();

        if (empty($events)) {
            return $this->error("Your application doesn't have any events matching the given criteria.");
        }

        $this->table(['Event', 'Listeners'], $events);
=======
     * The events dispatcher resolver callback.
     *
     * @var \Closure|null
     */
    protected static $eventsResolver;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $events = $this->getEvents()->sortKeys();

        if ($events->isEmpty()) {
            $this->components->info("Your application doesn't have any events matching the given criteria.");

            return;
        }

        $this->newLine();

        $events->each(function ($listeners, $event) {
            $this->components->twoColumnDetail($this->appendEventInterfaces($event));
            $this->components->bulletList($listeners);
        });

        $this->newLine();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get all of the events and listeners configured for the application.
     *
<<<<<<< HEAD
     * @return array
     */
    protected function getEvents()
    {
        $events = [];

        foreach ($this->laravel->getProviders(EventServiceProvider::class) as $provider) {
            $providerEvents = array_merge_recursive($provider->shouldDiscoverEvents() ? $provider->discoverEvents() : [], $provider->listens());

            $events = array_merge_recursive($events, $providerEvents);
        }
=======
     * @return \Illuminate\Support\Collection
     */
    protected function getEvents()
    {
        $events = collect($this->getListenersOnDispatcher());
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        if ($this->filteringByEvent()) {
            $events = $this->filterEvents($events);
        }

<<<<<<< HEAD
        return collect($events)->map(function ($listeners, $event) {
            return ['Event' => $event, 'Listeners' => implode(PHP_EOL, $listeners)];
        })->sortBy('Event')->values()->toArray();
=======
        return $events;
    }

    /**
     * Get the event / listeners from the dispatcher object.
     *
     * @return array
     */
    protected function getListenersOnDispatcher()
    {
        $events = [];

        foreach ($this->getRawListeners() as $event => $rawListeners) {
            foreach ($rawListeners as $rawListener) {
                if (is_string($rawListener)) {
                    $events[$event][] = $this->appendListenerInterfaces($rawListener);
                } elseif ($rawListener instanceof Closure) {
                    $events[$event][] = $this->stringifyClosure($rawListener);
                } elseif (is_array($rawListener) && count($rawListener) === 2) {
                    if (is_object($rawListener[0])) {
                        $rawListener[0] = get_class($rawListener[0]);
                    }

                    $events[$event][] = $this->appendListenerInterfaces(implode('@', $rawListener));
                }
            }
        }

        return $events;
    }

    /**
     * Add the event implemented interfaces to the output.
     *
     * @param  string  $event
     * @return string
     */
    protected function appendEventInterfaces($event)
    {
        if (! class_exists($event)) {
            return $event;
        }

        $interfaces = class_implements($event);

        if (in_array(ShouldBroadcast::class, $interfaces)) {
            $event .= ' <fg=bright-blue>(ShouldBroadcast)</>';
        }

        return $event;
    }

    /**
     * Add the listener implemented interfaces to the output.
     *
     * @param  string  $listener
     * @return string
     */
    protected function appendListenerInterfaces($listener)
    {
        $listener = explode('@', $listener);

        $interfaces = class_implements($listener[0]);

        $listener = implode('@', $listener);

        if (in_array(ShouldQueue::class, $interfaces)) {
            $listener .= ' <fg=bright-blue>(ShouldQueue)</>';
        }

        return $listener;
    }

    /**
     * Get a displayable string representation of a Closure listener.
     *
     * @param  \Closure  $rawListener
     * @return string
     */
    protected function stringifyClosure(Closure $rawListener)
    {
        $reflection = new ReflectionFunction($rawListener);

        $path = str_replace([base_path(), DIRECTORY_SEPARATOR], ['', '/'], $reflection->getFileName() ?: '');

        return 'Closure at: '.$path.':'.$reflection->getStartLine();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Filter the given events using the provided event name filter.
     *
<<<<<<< HEAD
     * @param  array  $events
     * @return array
     */
    protected function filterEvents(array $events)
=======
     * @param  \Illuminate\Support\Collection  $events
     * @return \Illuminate\Support\Collection
     */
    protected function filterEvents($events)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (! $eventName = $this->option('event')) {
            return $events;
        }

<<<<<<< HEAD
        return collect($events)->filter(function ($listeners, $event) use ($eventName) {
            return Str::contains($event, $eventName);
        })->toArray();
=======
        return $events->filter(
            fn ($listeners, $event) => str_contains($event, $eventName)
        );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Determine whether the user is filtering by an event name.
     *
     * @return bool
     */
    protected function filteringByEvent()
    {
        return ! empty($this->option('event'));
    }
<<<<<<< HEAD
=======

    /**
     * Gets the raw version of event listeners from the event dispatcher.
     *
     * @return array
     */
    protected function getRawListeners()
    {
        return $this->getEventsDispatcher()->getRawListeners();
    }

    /**
     * Get the event dispatcher.
     *
     * @return Illuminate\Events\Dispatcher
     */
    public function getEventsDispatcher()
    {
        return is_null(self::$eventsResolver)
            ? $this->getLaravel()->make('events')
            : call_user_func(self::$eventsResolver);
    }

    /**
     * Set a callback that should be used when resolving the events dispatcher.
     *
     * @param  \Closure|null  $resolver
     * @return void
     */
    public static function resolveEventsUsing($resolver)
    {
        static::$eventsResolver = $resolver;
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
