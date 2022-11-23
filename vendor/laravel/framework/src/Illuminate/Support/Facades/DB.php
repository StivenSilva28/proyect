<?php

namespace Illuminate\Support\Facades;

/**
<<<<<<< HEAD
 * @method static \Doctrine\DBAL\Driver\PDOConnection getPdo()
 * @method static \Illuminate\Database\ConnectionInterface connection(string $name = null)
 * @method static \Illuminate\Database\Query\Builder table(string $table, string $as = null)
=======
 * @method static \PDO getPdo()
 * @method static \Illuminate\Database\ConnectionInterface connection(string $name = null)
 * @method static \Illuminate\Database\Query\Builder table(string $table, string $as = null)
 * @method static \Illuminate\Database\Query\Builder query()
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 * @method static \Illuminate\Database\Query\Expression raw($value)
 * @method static array getQueryLog()
 * @method static array prepareBindings(array $bindings)
 * @method static array pretend(\Closure $callback)
 * @method static array select(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static bool insert(string $query, array $bindings = [])
 * @method static bool logging()
 * @method static bool statement(string $query, array $bindings = [])
 * @method static bool unprepared(string $query)
 * @method static int affectingStatement(string $query, array $bindings = [])
 * @method static int delete(string $query, array $bindings = [])
 * @method static int transactionLevel()
 * @method static int update(string $query, array $bindings = [])
 * @method static mixed selectOne(string $query, array $bindings = [], bool $useReadPdo = true)
 * @method static mixed transaction(\Closure $callback, int $attempts = 1)
 * @method static string getDefaultConnection()
 * @method static void afterCommit(\Closure $callback)
 * @method static void beginTransaction()
 * @method static void commit()
 * @method static void enableQueryLog()
 * @method static void disableQueryLog()
 * @method static void flushQueryLog()
<<<<<<< HEAD
=======
 * @method static void registerDoctrineType(string $class, string $name, string $type)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 * @method static \Illuminate\Database\Connection beforeExecuting(\Closure $callback)
 * @method static void listen(\Closure $callback)
 * @method static void rollBack(int $toLevel = null)
 * @method static void setDefaultConnection(string $name)
<<<<<<< HEAD
=======
 * @method static void whenQueryingForLongerThan(\DateTimeInterface|\Carbon\CarbonInterval|float|int $threshold, callable $handler)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 *
 * @see \Illuminate\Database\DatabaseManager
 * @see \Illuminate\Database\Connection
 */
class DB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'db';
    }
}
