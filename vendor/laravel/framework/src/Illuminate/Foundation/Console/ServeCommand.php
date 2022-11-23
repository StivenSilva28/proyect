<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Support\Env;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

=======
use Illuminate\Support\Carbon;
use Illuminate\Support\Env;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;
use function Termwind\terminal;

#[AsCommand(name: 'serve')]
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class ServeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';

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
    protected static $defaultName = 'serve';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server';

    /**
     * The current port offset.
     *
     * @var int
     */
    protected $portOffset = 0;

    /**
<<<<<<< HEAD
=======
     * The list of requests being handled and their start time.
     *
     * @var array<int, \Illuminate\Support\Carbon>
     */
    protected $requestsPool;

    /**
     * Indicates if the "Server running on..." output message has been displayed.
     *
     * @var bool
     */
    protected $serverRunningHasBeenDisplayed = false;

    /**
     * The environment variables that should be passed from host machine to the PHP server process.
     *
     * @var string[]
     */
    public static $passthroughVariables = [
        'APP_ENV',
        'LARAVEL_SAIL',
        'PHP_CLI_SERVER_WORKERS',
        'PHP_IDE_CONFIG',
        'SYSTEMROOT',
        'XDEBUG_CONFIG',
        'XDEBUG_MODE',
        'XDEBUG_SESSION',
    ];

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Execute the console command.
     *
     * @return int
     *
     * @throws \Exception
     */
    public function handle()
    {
<<<<<<< HEAD
        chdir(public_path());

        $this->line("<info>Starting Laravel development server:</info> http://{$this->host()}:{$this->port()}");

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $environmentFile = $this->option('env')
                            ? base_path('.env').'.'.$this->option('env')
                            : base_path('.env');

        $hasEnvironment = file_exists($environmentFile);

        $environmentLastModified = $hasEnvironment
                            ? filemtime($environmentFile)
                            : now()->addDays(30)->getTimestamp();

        $process = $this->startProcess($hasEnvironment);

        while ($process->isRunning()) {
            if ($hasEnvironment) {
                clearstatcache(false, $environmentFile);
            }

            if (! $this->option('no-reload') &&
                $hasEnvironment &&
                filemtime($environmentFile) > $environmentLastModified) {
                $environmentLastModified = filemtime($environmentFile);

<<<<<<< HEAD
                $this->comment('Environment modified. Restarting server...');

                $process->stop(5);

=======
                $this->newLine();

                $this->components->info('Environment modified. Restarting server...');

                $process->stop(5);

                $this->serverRunningHasBeenDisplayed = false;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $process = $this->startProcess($hasEnvironment);
            }

            usleep(500 * 1000);
        }

        $status = $process->getExitCode();

        if ($status && $this->canTryAnotherPort()) {
            $this->portOffset += 1;

            return $this->handle();
        }

        return $status;
    }

    /**
     * Start a new server process.
     *
     * @param  bool  $hasEnvironment
     * @return \Symfony\Component\Process\Process
     */
    protected function startProcess($hasEnvironment)
    {
<<<<<<< HEAD
        $process = new Process($this->serverCommand(), null, collect($_ENV)->mapWithKeys(function ($value, $key) use ($hasEnvironment) {
=======
        $process = new Process($this->serverCommand(), public_path(), collect($_ENV)->mapWithKeys(function ($value, $key) use ($hasEnvironment) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            if ($this->option('no-reload') || ! $hasEnvironment) {
                return [$key => $value];
            }

<<<<<<< HEAD
            return in_array($key, [
                'APP_ENV',
                'LARAVEL_SAIL',
                'PHP_CLI_SERVER_WORKERS',
                'PHP_IDE_CONFIG',
                'SYSTEMROOT',
                'XDEBUG_CONFIG',
                'XDEBUG_MODE',
                'XDEBUG_SESSION',
            ]) ? [$key => $value] : [$key => false];
        })->all());

        $process->start(function ($type, $buffer) {
            $this->output->write($buffer);
        });
=======
            return in_array($key, static::$passthroughVariables) ? [$key => $value] : [$key => false];
        })->all());

        $process->start($this->handleProcessOutput());
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $process;
    }

    /**
     * Get the full server command.
     *
     * @return array
     */
    protected function serverCommand()
    {
<<<<<<< HEAD
=======
        $server = file_exists(base_path('server.php'))
            ? base_path('server.php')
            : __DIR__.'/../resources/server.php';

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        return [
            (new PhpExecutableFinder)->find(false),
            '-S',
            $this->host().':'.$this->port(),
<<<<<<< HEAD
            base_path('server.php'),
=======
            $server,
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        ];
    }

    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function host()
    {
<<<<<<< HEAD
        [$host, ] = $this->getHostAndPort();
=======
        [$host] = $this->getHostAndPort();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $host;
    }

    /**
     * Get the port for the command.
     *
     * @return string
     */
    protected function port()
    {
        $port = $this->input->getOption('port');

        if (is_null($port)) {
            [, $port] = $this->getHostAndPort();
        }

        $port = $port ?: 8000;

        return $port + $this->portOffset;
    }

    /**
     * Get the host and port from the host option string.
     *
     * @return array
     */
    protected function getHostAndPort()
    {
        $hostParts = explode(':', $this->input->getOption('host'));

        return [
            $hostParts[0],
            $hostParts[1] ?? null,
        ];
    }

    /**
<<<<<<< HEAD
     * Check if the command has reached its max amount of port tries.
=======
     * Check if the command has reached its maximum number of port tries.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @return bool
     */
    protected function canTryAnotherPort()
    {
        return is_null($this->input->getOption('port')) &&
               ($this->input->getOption('tries') > $this->portOffset);
    }

    /**
<<<<<<< HEAD
=======
     * Returns a "callable" to handle the process output.
     *
     * @return callable(string, string): void
     */
    protected function handleProcessOutput()
    {
        return fn ($type, $buffer) => str($buffer)->explode("\n")->each(function ($line) {
            if (str($line)->contains('Development Server (http')) {
                if ($this->serverRunningHasBeenDisplayed) {
                    return;
                }

                $this->components->info("Server running on [http://{$this->host()}:{$this->port()}].");
                $this->comment('  <fg=yellow;options=bold>Press Ctrl+C to stop the server</>');

                $this->newLine();

                $this->serverRunningHasBeenDisplayed = true;
            } elseif (str($line)->contains(' Accepted')) {
                $requestPort = $this->getRequestPortFromLine($line);

                $this->requestsPool[$requestPort] = [
                    $this->getDateFromLine($line),
                    false,
                ];
            } elseif (str($line)->contains([' [200]: GET '])) {
                $requestPort = $this->getRequestPortFromLine($line);

                $this->requestsPool[$requestPort][1] = trim(explode('[200]: GET', $line)[1]);
            } elseif (str($line)->contains(' Closing')) {
                $requestPort = $this->getRequestPortFromLine($line);
                $request = $this->requestsPool[$requestPort];

                [$startDate, $file] = $request;

                $formattedStartedAt = $startDate->format('Y-m-d H:i:s');

                unset($this->requestsPool[$requestPort]);

                [$date, $time] = explode(' ', $formattedStartedAt);

                $this->output->write("  <fg=gray>$date</> $time");

                $runTime = $this->getDateFromLine($line)->diffInSeconds($startDate);

                if ($file) {
                    $this->output->write($file = " $file");
                }

                $dots = max(terminal()->width() - mb_strlen($formattedStartedAt) - mb_strlen($file) - mb_strlen($runTime) - 9, 0);

                $this->output->write(' '.str_repeat('<fg=gray>.</>', $dots));
                $this->output->writeln(" <fg=gray>~ {$runTime}s</>");
            } elseif (str($line)->contains(['Closed without sending a request'])) {
                // ...
            } elseif (! empty($line)) {
                $warning = explode('] ', $line);
                $this->components->warn(count($warning) > 1 ? $warning[1] : $warning[0]);
            }
        });
    }

    /**
     * Get the date from the given PHP server output.
     *
     * @param  string  $line
     * @return \Illuminate\Support\Carbon
     */
    protected function getDateFromLine($line)
    {
        $regex = env('PHP_CLI_SERVER_WORKERS', 1) > 1
            ? '/^\[\d+]\s\[(.*)]/'
            : '/^\[([^\]]+)\]/';

        preg_match($regex, $line, $matches);

        return Carbon::createFromFormat('D M d H:i:s Y', $matches[1]);
    }

    /**
     * Get the request port from the given PHP server output.
     *
     * @param  string  $line
     * @return int
     */
    protected function getRequestPortFromLine($line)
    {
        preg_match('/:(\d+)\s(?:(?:\w+$)|(?:\[.*))/', $line, $matches);

        return (int) $matches[1];
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
<<<<<<< HEAD
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on', '127.0.0.1'],
=======
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on', Env::get('SERVER_HOST', '127.0.0.1')],
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on', Env::get('SERVER_PORT')],
            ['tries', null, InputOption::VALUE_OPTIONAL, 'The max number of ports to attempt to serve from', 10],
            ['no-reload', null, InputOption::VALUE_NONE, 'Do not reload the development server on .env file changes'],
        ];
    }
}