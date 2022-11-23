<?php

namespace Illuminate\Foundation\Bootstrap;

use ErrorException;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Log\LogManager;
use Monolog\Handler\NullHandler;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Throwable;

class HandleExceptions
{
    /**
     * Reserved memory so that errors can be displayed properly on memory exhaustion.
     *
     * @var string
     */
    public static $reservedMemory;

    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
<<<<<<< HEAD
    protected $app;
=======
    protected static $app;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        self::$reservedMemory = str_repeat('x', 32768);

<<<<<<< HEAD
        $this->app = $app;

        error_reporting(-1);

        set_error_handler([$this, 'handleError']);

        set_exception_handler([$this, 'handleException']);

        register_shutdown_function([$this, 'handleShutdown']);
=======
        static::$app = $app;

        error_reporting(-1);

        set_error_handler($this->forwardsTo('handleError'));

        set_exception_handler($this->forwardsTo('handleException'));

        register_shutdown_function($this->forwardsTo('handleShutdown'));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        if (! $app->environment('testing')) {
            ini_set('display_errors', 'Off');
        }
    }

    /**
     * Report PHP deprecations, or convert PHP errors to ErrorException instances.
     *
     * @param  int  $level
     * @param  string  $message
     * @param  string  $file
     * @param  int  $line
     * @param  array  $context
     * @return void
     *
     * @throws \ErrorException
     */
    public function handleError($level, $message, $file = '', $line = 0, $context = [])
    {
        if ($this->isDeprecation($level)) {
<<<<<<< HEAD
            return $this->handleDeprecation($message, $file, $line);
=======
            return $this->handleDeprecationError($message, $file, $line, $level);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        if (error_reporting() & $level) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Reports a deprecation to the "deprecations" logger.
     *
     * @param  string  $message
     * @param  string  $file
     * @param  int  $line
     * @return void
<<<<<<< HEAD
     */
    public function handleDeprecation($message, $file, $line)
    {
        if (! class_exists(LogManager::class)
            || ! $this->app->hasBeenBootstrapped()
            || $this->app->runningUnitTests()
=======
     *
     * @deprecated Use handleDeprecationError instead.
     */
    public function handleDeprecation($message, $file, $line)
    {
        $this->handleDeprecationError($message, $file, $line);
    }

    /**
     * Reports a deprecation to the "deprecations" logger.
     *
     * @param  string  $message
     * @param  string  $file
     * @param  int  $line
     * @param  int  $level
     * @return void
     */
    public function handleDeprecationError($message, $file, $line, $level = E_DEPRECATED)
    {
        if (! class_exists(LogManager::class)
            || ! static::$app->hasBeenBootstrapped()
            || static::$app->runningUnitTests()
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        ) {
            return;
        }

        try {
<<<<<<< HEAD
            $logger = $this->app->make(LogManager::class);
=======
            $logger = static::$app->make(LogManager::class);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        } catch (Exception $e) {
            return;
        }

        $this->ensureDeprecationLoggerIsConfigured();

<<<<<<< HEAD
        with($logger->channel('deprecations'), function ($log) use ($message, $file, $line) {
            $log->warning(sprintf('%s in %s on line %s',
                $message, $file, $line
            ));
=======
        $options = static::$app['config']->get('logging.deprecations') ?? [];

        with($logger->channel('deprecations'), function ($log) use ($message, $file, $line, $level, $options) {
            if ($options['trace'] ?? false) {
                $log->warning((string) new ErrorException($message, 0, $level, $file, $line));
            } else {
                $log->warning(sprintf('%s in %s on line %s',
                    $message, $file, $line
                ));
            }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        });
    }

    /**
     * Ensure the "deprecations" logger is configured.
     *
     * @return void
     */
    protected function ensureDeprecationLoggerIsConfigured()
    {
<<<<<<< HEAD
        with($this->app['config'], function ($config) {
=======
        with(static::$app['config'], function ($config) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            if ($config->get('logging.channels.deprecations')) {
                return;
            }

            $this->ensureNullLogDriverIsConfigured();

<<<<<<< HEAD
            $driver = $config->get('logging.deprecations') ?? 'null';
=======
            if (is_array($options = $config->get('logging.deprecations'))) {
                $driver = $options['channel'] ?? 'null';
            } else {
                $driver = $options ?? 'null';
            }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            $config->set('logging.channels.deprecations', $config->get("logging.channels.{$driver}"));
        });
    }

    /**
     * Ensure the "null" log driver is configured.
     *
     * @return void
     */
    protected function ensureNullLogDriverIsConfigured()
    {
<<<<<<< HEAD
        with($this->app['config'], function ($config) {
=======
        with(static::$app['config'], function ($config) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            if ($config->get('logging.channels.null')) {
                return;
            }

            $config->set('logging.channels.null', [
                'driver' => 'monolog',
                'handler' => NullHandler::class,
            ]);
        });
    }

    /**
     * Handle an uncaught exception from the application.
     *
     * Note: Most exceptions can be handled via the try / catch block in
     * the HTTP and Console kernels. But, fatal error exceptions must
     * be handled differently since they are not normal exceptions.
     *
     * @param  \Throwable  $e
     * @return void
     */
    public function handleException(Throwable $e)
    {
        self::$reservedMemory = null;

        try {
            $this->getExceptionHandler()->report($e);
        } catch (Exception $e) {
            //
        }

<<<<<<< HEAD
        if ($this->app->runningInConsole()) {
=======
        if (static::$app->runningInConsole()) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $this->renderForConsole($e);
        } else {
            $this->renderHttpResponse($e);
        }
    }

    /**
     * Render an exception to the console.
     *
     * @param  \Throwable  $e
     * @return void
     */
    protected function renderForConsole(Throwable $e)
    {
        $this->getExceptionHandler()->renderForConsole(new ConsoleOutput, $e);
    }

    /**
     * Render an exception as an HTTP response and send it.
     *
     * @param  \Throwable  $e
     * @return void
     */
    protected function renderHttpResponse(Throwable $e)
    {
<<<<<<< HEAD
        $this->getExceptionHandler()->render($this->app['request'], $e)->send();
=======
        $this->getExceptionHandler()->render(static::$app['request'], $e)->send();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Handle the PHP shutdown event.
     *
     * @return void
     */
    public function handleShutdown()
    {
        self::$reservedMemory = null;

        if (! is_null($error = error_get_last()) && $this->isFatal($error['type'])) {
            $this->handleException($this->fatalErrorFromPhpError($error, 0));
        }
    }

    /**
     * Create a new fatal error instance from an error array.
     *
     * @param  array  $error
     * @param  int|null  $traceOffset
     * @return \Symfony\Component\ErrorHandler\Error\FatalError
     */
    protected function fatalErrorFromPhpError(array $error, $traceOffset = null)
    {
        return new FatalError($error['message'], 0, $error, $traceOffset);
    }

    /**
<<<<<<< HEAD
=======
     * Forward a method call to the given method if an application instance exists.
     *
     * @return callable
     */
    protected function forwardsTo($method)
    {
        return fn (...$arguments) => static::$app
            ? $this->{$method}(...$arguments)
            : false;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Determine if the error level is a deprecation.
     *
     * @param  int  $level
     * @return bool
     */
    protected function isDeprecation($level)
    {
        return in_array($level, [E_DEPRECATED, E_USER_DEPRECATED]);
    }

    /**
     * Determine if the error type is fatal.
     *
     * @param  int  $type
     * @return bool
     */
    protected function isFatal($type)
    {
        return in_array($type, [E_COMPILE_ERROR, E_CORE_ERROR, E_ERROR, E_PARSE]);
    }

    /**
     * Get an instance of the exception handler.
     *
     * @return \Illuminate\Contracts\Debug\ExceptionHandler
     */
    protected function getExceptionHandler()
    {
<<<<<<< HEAD
        return $this->app->make(ExceptionHandler::class);
=======
        return static::$app->make(ExceptionHandler::class);
    }

    /**
     * Clear the local application instance from memory.
     *
     * @return void
     */
    public static function forgetApp()
    {
        static::$app = null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
