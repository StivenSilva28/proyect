<?php

namespace Illuminate\Foundation\Providers;

use Illuminate\Auth\Console\ClearResetsCommand;
use Illuminate\Cache\Console\CacheTableCommand;
use Illuminate\Cache\Console\ClearCommand as CacheClearCommand;
use Illuminate\Cache\Console\ForgetCommand as CacheForgetCommand;
use Illuminate\Console\Scheduling\ScheduleClearCacheCommand;
use Illuminate\Console\Scheduling\ScheduleFinishCommand;
use Illuminate\Console\Scheduling\ScheduleListCommand;
use Illuminate\Console\Scheduling\ScheduleRunCommand;
use Illuminate\Console\Scheduling\ScheduleTestCommand;
use Illuminate\Console\Scheduling\ScheduleWorkCommand;
<<<<<<< HEAD
=======
use Illuminate\Console\Signals;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Database\Console\DumpCommand;
use Illuminate\Database\Console\Factories\FactoryMakeCommand;
<<<<<<< HEAD
use Illuminate\Database\Console\PruneCommand;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use Illuminate\Database\Console\WipeCommand;
=======
use Illuminate\Database\Console\MonitorCommand as DatabaseMonitorCommand;
use Illuminate\Database\Console\PruneCommand;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use Illuminate\Database\Console\ShowCommand;
use Illuminate\Database\Console\TableCommand as DatabaseTableCommand;
use Illuminate\Database\Console\WipeCommand;
use Illuminate\Foundation\Console\AboutCommand;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Foundation\Console\CastMakeCommand;
use Illuminate\Foundation\Console\ChannelMakeCommand;
use Illuminate\Foundation\Console\ClearCompiledCommand;
use Illuminate\Foundation\Console\ComponentMakeCommand;
use Illuminate\Foundation\Console\ConfigCacheCommand;
use Illuminate\Foundation\Console\ConfigClearCommand;
use Illuminate\Foundation\Console\ConsoleMakeCommand;
<<<<<<< HEAD
use Illuminate\Foundation\Console\DownCommand;
use Illuminate\Foundation\Console\EnvironmentCommand;
=======
use Illuminate\Foundation\Console\DocsCommand;
use Illuminate\Foundation\Console\DownCommand;
use Illuminate\Foundation\Console\EnvironmentCommand;
use Illuminate\Foundation\Console\EnvironmentDecryptCommand;
use Illuminate\Foundation\Console\EnvironmentEncryptCommand;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Foundation\Console\EventCacheCommand;
use Illuminate\Foundation\Console\EventClearCommand;
use Illuminate\Foundation\Console\EventGenerateCommand;
use Illuminate\Foundation\Console\EventListCommand;
use Illuminate\Foundation\Console\EventMakeCommand;
use Illuminate\Foundation\Console\ExceptionMakeCommand;
use Illuminate\Foundation\Console\JobMakeCommand;
use Illuminate\Foundation\Console\KeyGenerateCommand;
use Illuminate\Foundation\Console\ListenerMakeCommand;
use Illuminate\Foundation\Console\MailMakeCommand;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Foundation\Console\NotificationMakeCommand;
use Illuminate\Foundation\Console\ObserverMakeCommand;
use Illuminate\Foundation\Console\OptimizeClearCommand;
use Illuminate\Foundation\Console\OptimizeCommand;
use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Illuminate\Foundation\Console\PolicyMakeCommand;
use Illuminate\Foundation\Console\ProviderMakeCommand;
use Illuminate\Foundation\Console\RequestMakeCommand;
use Illuminate\Foundation\Console\ResourceMakeCommand;
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Foundation\Console\RouteClearCommand;
use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Foundation\Console\RuleMakeCommand;
<<<<<<< HEAD
use Illuminate\Foundation\Console\ServeCommand;
=======
use Illuminate\Foundation\Console\ScopeMakeCommand;
use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Foundation\Console\ShowModelCommand;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Foundation\Console\StubPublishCommand;
use Illuminate\Foundation\Console\TestMakeCommand;
use Illuminate\Foundation\Console\UpCommand;
use Illuminate\Foundation\Console\VendorPublishCommand;
use Illuminate\Foundation\Console\ViewCacheCommand;
use Illuminate\Foundation\Console\ViewClearCommand;
use Illuminate\Notifications\Console\NotificationTableCommand;
use Illuminate\Queue\Console\BatchesTableCommand;
use Illuminate\Queue\Console\ClearCommand as QueueClearCommand;
use Illuminate\Queue\Console\FailedTableCommand;
use Illuminate\Queue\Console\FlushFailedCommand as FlushFailedQueueCommand;
use Illuminate\Queue\Console\ForgetFailedCommand as ForgetFailedQueueCommand;
use Illuminate\Queue\Console\ListenCommand as QueueListenCommand;
use Illuminate\Queue\Console\ListFailedCommand as ListFailedQueueCommand;
use Illuminate\Queue\Console\MonitorCommand as QueueMonitorCommand;
<<<<<<< HEAD
use Illuminate\Queue\Console\PruneBatchesCommand as PruneBatchesQueueCommand;
use Illuminate\Queue\Console\PruneFailedJobsCommand;
=======
use Illuminate\Queue\Console\PruneBatchesCommand as QueuePruneBatchesCommand;
use Illuminate\Queue\Console\PruneFailedJobsCommand as QueuePruneFailedJobsCommand;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Queue\Console\RestartCommand as QueueRestartCommand;
use Illuminate\Queue\Console\RetryBatchCommand as QueueRetryBatchCommand;
use Illuminate\Queue\Console\RetryCommand as QueueRetryCommand;
use Illuminate\Queue\Console\TableCommand;
use Illuminate\Queue\Console\WorkCommand as QueueWorkCommand;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Session\Console\SessionTableCommand;
use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
<<<<<<< HEAD
        'CacheClear' => 'command.cache.clear',
        'CacheForget' => 'command.cache.forget',
        'ClearCompiled' => 'command.clear-compiled',
        'ClearResets' => 'command.auth.resets.clear',
        'ConfigCache' => 'command.config.cache',
        'ConfigClear' => 'command.config.clear',
        'Db' => DbCommand::class,
        'DbPrune' => 'command.db.prune',
        'DbWipe' => 'command.db.wipe',
        'Down' => 'command.down',
        'Environment' => 'command.environment',
        'EventCache' => 'command.event.cache',
        'EventClear' => 'command.event.clear',
        'EventList' => 'command.event.list',
        'KeyGenerate' => 'command.key.generate',
        'Optimize' => 'command.optimize',
        'OptimizeClear' => 'command.optimize.clear',
        'PackageDiscover' => 'command.package.discover',
        'QueueClear' => 'command.queue.clear',
        'QueueFailed' => 'command.queue.failed',
        'QueueFlush' => 'command.queue.flush',
        'QueueForget' => 'command.queue.forget',
        'QueueListen' => 'command.queue.listen',
        'QueueMonitor' => 'command.queue.monitor',
        'QueuePruneBatches' => 'command.queue.prune-batches',
        'QueuePruneFailedJobs' => 'command.queue.prune-failed-jobs',
        'QueueRestart' => 'command.queue.restart',
        'QueueRetry' => 'command.queue.retry',
        'QueueRetryBatch' => 'command.queue.retry-batch',
        'QueueWork' => 'command.queue.work',
        'RouteCache' => 'command.route.cache',
        'RouteClear' => 'command.route.clear',
        'RouteList' => 'command.route.list',
        'SchemaDump' => 'command.schema.dump',
        'Seed' => 'command.seed',
=======
        'About' => AboutCommand::class,
        'CacheClear' => CacheClearCommand::class,
        'CacheForget' => CacheForgetCommand::class,
        'ClearCompiled' => ClearCompiledCommand::class,
        'ClearResets' => ClearResetsCommand::class,
        'ConfigCache' => ConfigCacheCommand::class,
        'ConfigClear' => ConfigClearCommand::class,
        'Db' => DbCommand::class,
        'DbMonitor' => DatabaseMonitorCommand::class,
        'DbPrune' => PruneCommand::class,
        'DbShow' => ShowCommand::class,
        'DbTable' => DatabaseTableCommand::class,
        'DbWipe' => WipeCommand::class,
        'Down' => DownCommand::class,
        'Environment' => EnvironmentCommand::class,
        'EnvironmentDecrypt' => EnvironmentDecryptCommand::class,
        'EnvironmentEncrypt' => EnvironmentEncryptCommand::class,
        'EventCache' => EventCacheCommand::class,
        'EventClear' => EventClearCommand::class,
        'EventList' => EventListCommand::class,
        'KeyGenerate' => KeyGenerateCommand::class,
        'Optimize' => OptimizeCommand::class,
        'OptimizeClear' => OptimizeClearCommand::class,
        'PackageDiscover' => PackageDiscoverCommand::class,
        'QueueClear' => QueueClearCommand::class,
        'QueueFailed' => ListFailedQueueCommand::class,
        'QueueFlush' => FlushFailedQueueCommand::class,
        'QueueForget' => ForgetFailedQueueCommand::class,
        'QueueListen' => QueueListenCommand::class,
        'QueueMonitor' => QueueMonitorCommand::class,
        'QueuePruneBatches' => QueuePruneBatchesCommand::class,
        'QueuePruneFailedJobs' => QueuePruneFailedJobsCommand::class,
        'QueueRestart' => QueueRestartCommand::class,
        'QueueRetry' => QueueRetryCommand::class,
        'QueueRetryBatch' => QueueRetryBatchCommand::class,
        'QueueWork' => QueueWorkCommand::class,
        'RouteCache' => RouteCacheCommand::class,
        'RouteClear' => RouteClearCommand::class,
        'RouteList' => RouteListCommand::class,
        'SchemaDump' => DumpCommand::class,
        'Seed' => SeedCommand::class,
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        'ScheduleFinish' => ScheduleFinishCommand::class,
        'ScheduleList' => ScheduleListCommand::class,
        'ScheduleRun' => ScheduleRunCommand::class,
        'ScheduleClearCache' => ScheduleClearCacheCommand::class,
        'ScheduleTest' => ScheduleTestCommand::class,
        'ScheduleWork' => ScheduleWorkCommand::class,
<<<<<<< HEAD
        'StorageLink' => 'command.storage.link',
        'Up' => 'command.up',
        'ViewCache' => 'command.view.cache',
        'ViewClear' => 'command.view.clear',
=======
        'ShowModel' => ShowModelCommand::class,
        'StorageLink' => StorageLinkCommand::class,
        'Up' => UpCommand::class,
        'ViewCache' => ViewCacheCommand::class,
        'ViewClear' => ViewClearCommand::class,
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    ];

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $devCommands = [
<<<<<<< HEAD
        'CacheTable' => 'command.cache.table',
        'CastMake' => 'command.cast.make',
        'ChannelMake' => 'command.channel.make',
        'ComponentMake' => 'command.component.make',
        'ConsoleMake' => 'command.console.make',
        'ControllerMake' => 'command.controller.make',
        'EventGenerate' => 'command.event.generate',
        'EventMake' => 'command.event.make',
        'ExceptionMake' => 'command.exception.make',
        'FactoryMake' => 'command.factory.make',
        'JobMake' => 'command.job.make',
        'ListenerMake' => 'command.listener.make',
        'MailMake' => 'command.mail.make',
        'MiddlewareMake' => 'command.middleware.make',
        'ModelMake' => 'command.model.make',
        'NotificationMake' => 'command.notification.make',
        'NotificationTable' => 'command.notification.table',
        'ObserverMake' => 'command.observer.make',
        'PolicyMake' => 'command.policy.make',
        'ProviderMake' => 'command.provider.make',
        'QueueFailedTable' => 'command.queue.failed-table',
        'QueueTable' => 'command.queue.table',
        'QueueBatchesTable' => 'command.queue.batches-table',
        'RequestMake' => 'command.request.make',
        'ResourceMake' => 'command.resource.make',
        'RuleMake' => 'command.rule.make',
        'SeederMake' => 'command.seeder.make',
        'SessionTable' => 'command.session.table',
        'Serve' => 'command.serve',
        'StubPublish' => 'command.stub.publish',
        'TestMake' => 'command.test.make',
        'VendorPublish' => 'command.vendor.publish',
=======
        'CacheTable' => CacheTableCommand::class,
        'CastMake' => CastMakeCommand::class,
        'ChannelMake' => ChannelMakeCommand::class,
        'ComponentMake' => ComponentMakeCommand::class,
        'ConsoleMake' => ConsoleMakeCommand::class,
        'ControllerMake' => ControllerMakeCommand::class,
        'Docs' => DocsCommand::class,
        'EventGenerate' => EventGenerateCommand::class,
        'EventMake' => EventMakeCommand::class,
        'ExceptionMake' => ExceptionMakeCommand::class,
        'FactoryMake' => FactoryMakeCommand::class,
        'JobMake' => JobMakeCommand::class,
        'ListenerMake' => ListenerMakeCommand::class,
        'MailMake' => MailMakeCommand::class,
        'MiddlewareMake' => MiddlewareMakeCommand::class,
        'ModelMake' => ModelMakeCommand::class,
        'NotificationMake' => NotificationMakeCommand::class,
        'NotificationTable' => NotificationTableCommand::class,
        'ObserverMake' => ObserverMakeCommand::class,
        'PolicyMake' => PolicyMakeCommand::class,
        'ProviderMake' => ProviderMakeCommand::class,
        'QueueFailedTable' => FailedTableCommand::class,
        'QueueTable' => TableCommand::class,
        'QueueBatchesTable' => BatchesTableCommand::class,
        'RequestMake' => RequestMakeCommand::class,
        'ResourceMake' => ResourceMakeCommand::class,
        'RuleMake' => RuleMakeCommand::class,
        'ScopeMake' => ScopeMakeCommand::class,
        'SeederMake' => SeederMakeCommand::class,
        'SessionTable' => SessionTableCommand::class,
        'Serve' => ServeCommand::class,
        'StubPublish' => StubPublishCommand::class,
        'TestMake' => TestMakeCommand::class,
        'VendorPublish' => VendorPublishCommand::class,
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands(array_merge(
<<<<<<< HEAD
            $this->commands, $this->devCommands
        ));
=======
            $this->commands,
            $this->devCommands
        ));

        Signals::resolveAvailabilityUsing(function () {
            return $this->app->runningInConsole()
                && ! $this->app->runningUnitTests()
                && extension_loaded('pcntl');
        });
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Register the given commands.
     *
     * @param  array  $commands
     * @return void
     */
    protected function registerCommands(array $commands)
    {
<<<<<<< HEAD
        foreach (array_keys($commands) as $command) {
            $this->{"register{$command}Command"}();
=======
        foreach ($commands as $commandName => $command) {
            $method = "register{$commandName}Command";

            if (method_exists($this, $method)) {
                $this->{$method}();
            } else {
                $this->app->singleton($command);
            }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        $this->commands(array_values($commands));
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerCacheClearCommand()
    {
        $this->app->singleton('command.cache.clear', function ($app) {
=======
    protected function registerAboutCommand()
    {
        $this->app->singleton(AboutCommand::class, function ($app) {
            return new AboutCommand($app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerCacheClearCommand()
    {
        $this->app->singleton(CacheClearCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new CacheClearCommand($app['cache'], $app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerCacheForgetCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.cache.forget', function ($app) {
=======
        $this->app->singleton(CacheForgetCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new CacheForgetCommand($app['cache']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerCacheTableCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.cache.table', function ($app) {
=======
        $this->app->singleton(CacheTableCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new CacheTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerCastMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.cast.make', function ($app) {
=======
        $this->app->singleton(CastMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new CastMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerChannelMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.channel.make', function ($app) {
=======
        $this->app->singleton(ChannelMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ChannelMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerClearCompiledCommand()
    {
        $this->app->singleton('command.clear-compiled', function () {
            return new ClearCompiledCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerClearResetsCommand()
    {
        $this->app->singleton('command.auth.resets.clear', function () {
            return new ClearResetsCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerComponentMakeCommand()
    {
        $this->app->singleton('command.component.make', function ($app) {
=======
    protected function registerComponentMakeCommand()
    {
        $this->app->singleton(ComponentMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ComponentMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerConfigCacheCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.config.cache', function ($app) {
=======
        $this->app->singleton(ConfigCacheCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ConfigCacheCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerConfigClearCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.config.clear', function ($app) {
=======
        $this->app->singleton(ConfigClearCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ConfigClearCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerConsoleMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.console.make', function ($app) {
=======
        $this->app->singleton(ConsoleMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ConsoleMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerControllerMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.controller.make', function ($app) {
=======
        $this->app->singleton(ControllerMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ControllerMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerDbCommand()
    {
        $this->app->singleton(DbCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerDbPruneCommand()
    {
        $this->app->singleton('command.db.prune', function ($app) {
            return new PruneCommand($app['events']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerDbWipeCommand()
    {
        $this->app->singleton('command.db.wipe', function () {
            return new WipeCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerEventGenerateCommand()
    {
        $this->app->singleton('command.event.generate', function () {
            return new EventGenerateCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerEventMakeCommand()
    {
        $this->app->singleton('command.event.make', function ($app) {
=======
    protected function registerEventMakeCommand()
    {
        $this->app->singleton(EventMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new EventMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerExceptionMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.exception.make', function ($app) {
=======
        $this->app->singleton(ExceptionMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ExceptionMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerFactoryMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.factory.make', function ($app) {
=======
        $this->app->singleton(FactoryMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new FactoryMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerDownCommand()
    {
        $this->app->singleton('command.down', function () {
            return new DownCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerEnvironmentCommand()
    {
        $this->app->singleton('command.environment', function () {
            return new EnvironmentCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerEventCacheCommand()
    {
        $this->app->singleton('command.event.cache', function () {
            return new EventCacheCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerEventClearCommand()
    {
        $this->app->singleton('command.event.clear', function ($app) {
=======
    protected function registerEventClearCommand()
    {
        $this->app->singleton(EventClearCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new EventClearCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerEventListCommand()
    {
        $this->app->singleton('command.event.list', function () {
            return new EventListCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerJobMakeCommand()
    {
        $this->app->singleton('command.job.make', function ($app) {
=======
    protected function registerJobMakeCommand()
    {
        $this->app->singleton(JobMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new JobMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerKeyGenerateCommand()
    {
        $this->app->singleton('command.key.generate', function () {
            return new KeyGenerateCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerListenerMakeCommand()
    {
        $this->app->singleton('command.listener.make', function ($app) {
=======
    protected function registerListenerMakeCommand()
    {
        $this->app->singleton(ListenerMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ListenerMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMailMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.mail.make', function ($app) {
=======
        $this->app->singleton(MailMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new MailMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMiddlewareMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.middleware.make', function ($app) {
=======
        $this->app->singleton(MiddlewareMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new MiddlewareMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerModelMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.model.make', function ($app) {
=======
        $this->app->singleton(ModelMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ModelMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerNotificationMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.notification.make', function ($app) {
=======
        $this->app->singleton(NotificationMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new NotificationMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerNotificationTableCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.notification.table', function ($app) {
=======
        $this->app->singleton(NotificationTableCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new NotificationTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerOptimizeCommand()
    {
        $this->app->singleton('command.optimize', function () {
            return new OptimizeCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerObserverMakeCommand()
    {
        $this->app->singleton('command.observer.make', function ($app) {
=======
    protected function registerObserverMakeCommand()
    {
        $this->app->singleton(ObserverMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ObserverMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerOptimizeClearCommand()
    {
        $this->app->singleton('command.optimize.clear', function () {
            return new OptimizeClearCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerPackageDiscoverCommand()
    {
        $this->app->singleton('command.package.discover', function () {
            return new PackageDiscoverCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerPolicyMakeCommand()
    {
        $this->app->singleton('command.policy.make', function ($app) {
=======
    protected function registerPolicyMakeCommand()
    {
        $this->app->singleton(PolicyMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new PolicyMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerProviderMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.provider.make', function ($app) {
=======
        $this->app->singleton(ProviderMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ProviderMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerQueueFailedCommand()
    {
        $this->app->singleton('command.queue.failed', function () {
            return new ListFailedQueueCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueForgetCommand()
    {
        $this->app->singleton('command.queue.forget', function () {
            return new ForgetFailedQueueCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueFlushCommand()
    {
        $this->app->singleton('command.queue.flush', function () {
            return new FlushFailedQueueCommand;
        });
=======
    protected function registerQueueForgetCommand()
    {
        $this->app->singleton(ForgetFailedQueueCommand::class);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueListenCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.listen', function ($app) {
=======
        $this->app->singleton(QueueListenCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new QueueListenCommand($app['queue.listener']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueMonitorCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.monitor', function ($app) {
=======
        $this->app->singleton(QueueMonitorCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new QueueMonitorCommand($app['queue'], $app['events']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueuePruneBatchesCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.prune-batches', function () {
            return new PruneBatchesQueueCommand;
=======
        $this->app->singleton(QueuePruneBatchesCommand::class, function () {
            return new QueuePruneBatchesCommand;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueuePruneFailedJobsCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.prune-failed-jobs', function () {
            return new PruneFailedJobsCommand;
=======
        $this->app->singleton(QueuePruneFailedJobsCommand::class, function () {
            return new QueuePruneFailedJobsCommand;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueRestartCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.restart', function ($app) {
=======
        $this->app->singleton(QueueRestartCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new QueueRestartCommand($app['cache.store']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerQueueRetryCommand()
    {
        $this->app->singleton('command.queue.retry', function () {
            return new QueueRetryCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueRetryBatchCommand()
    {
        $this->app->singleton('command.queue.retry-batch', function () {
            return new QueueRetryBatchCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueWorkCommand()
    {
        $this->app->singleton('command.queue.work', function ($app) {
=======
    protected function registerQueueWorkCommand()
    {
        $this->app->singleton(QueueWorkCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new QueueWorkCommand($app['queue.worker'], $app['cache.store']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerQueueClearCommand()
    {
        $this->app->singleton('command.queue.clear', function () {
            return new QueueClearCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueFailedTableCommand()
    {
        $this->app->singleton('command.queue.failed-table', function ($app) {
=======
    protected function registerQueueFailedTableCommand()
    {
        $this->app->singleton(FailedTableCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new FailedTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueTableCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.table', function ($app) {
=======
        $this->app->singleton(TableCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new TableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerQueueBatchesTableCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.queue.batches-table', function ($app) {
=======
        $this->app->singleton(BatchesTableCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new BatchesTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRequestMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.request.make', function ($app) {
=======
        $this->app->singleton(RequestMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new RequestMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerResourceMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.resource.make', function ($app) {
=======
        $this->app->singleton(ResourceMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ResourceMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRuleMakeCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.rule.make', function ($app) {
=======
        $this->app->singleton(RuleMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new RuleMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerSeederMakeCommand()
    {
        $this->app->singleton('command.seeder.make', function ($app) {
=======
    protected function registerScopeMakeCommand()
    {
        $this->app->singleton(ScopeMakeCommand::class, function ($app) {
            return new ScopeMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerSeederMakeCommand()
    {
        $this->app->singleton(SeederMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new SeederMakeCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerSessionTableCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.session.table', function ($app) {
=======
        $this->app->singleton(SessionTableCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new SessionTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerStorageLinkCommand()
    {
        $this->app->singleton('command.storage.link', function () {
            return new StorageLinkCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRouteCacheCommand()
    {
        $this->app->singleton('command.route.cache', function ($app) {
=======
    protected function registerRouteCacheCommand()
    {
        $this->app->singleton(RouteCacheCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new RouteCacheCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRouteClearCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.route.clear', function ($app) {
=======
        $this->app->singleton(RouteClearCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new RouteClearCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerRouteListCommand()
    {
<<<<<<< HEAD
        $this->app->singleton('command.route.list', function ($app) {
=======
        $this->app->singleton(RouteListCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new RouteListCommand($app['router']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerSchemaDumpCommand()
    {
        $this->app->singleton('command.schema.dump', function () {
            return new DumpCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerSeedCommand()
    {
        $this->app->singleton('command.seed', function ($app) {
=======
    protected function registerSeedCommand()
    {
        $this->app->singleton(SeedCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new SeedCommand($app['db']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerScheduleClearCacheCommand()
    {
        $this->app->singleton(ScheduleClearCacheCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerScheduleFinishCommand()
    {
        $this->app->singleton(ScheduleFinishCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerScheduleListCommand()
    {
        $this->app->singleton(ScheduleListCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerScheduleRunCommand()
    {
        $this->app->singleton(ScheduleRunCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerScheduleTestCommand()
    {
        $this->app->singleton(ScheduleTestCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerScheduleWorkCommand()
    {
        $this->app->singleton(ScheduleWorkCommand::class);
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerServeCommand()
    {
        $this->app->singleton('command.serve', function () {
            return new ServeCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerStubPublishCommand()
    {
        $this->app->singleton('command.stub.publish', function () {
            return new StubPublishCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerTestMakeCommand()
    {
        $this->app->singleton('command.test.make', function ($app) {
=======
    protected function registerTestMakeCommand()
    {
        $this->app->singleton(TestMakeCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new TestMakeCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerUpCommand()
    {
        $this->app->singleton('command.up', function () {
            return new UpCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerVendorPublishCommand()
    {
        $this->app->singleton('command.vendor.publish', function ($app) {
=======
    protected function registerVendorPublishCommand()
    {
        $this->app->singleton(VendorPublishCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new VendorPublishCommand($app['files']);
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function registerViewCacheCommand()
    {
        $this->app->singleton('command.view.cache', function () {
            return new ViewCacheCommand;
        });
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerViewClearCommand()
    {
        $this->app->singleton('command.view.clear', function ($app) {
=======
    protected function registerViewClearCommand()
    {
        $this->app->singleton(ViewClearCommand::class, function ($app) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new ViewClearCommand($app['files']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(array_values($this->commands), array_values($this->devCommands));
    }
}
