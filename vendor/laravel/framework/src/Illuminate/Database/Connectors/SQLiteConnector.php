<?php

namespace Illuminate\Database\Connectors;

<<<<<<< HEAD
use InvalidArgumentException;
=======
use Illuminate\Database\SQLiteDatabaseDoesNotExistException;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

class SQLiteConnector extends Connector implements ConnectorInterface
{
    /**
     * Establish a database connection.
     *
     * @param  array  $config
     * @return \PDO
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException
=======
     * @throws \Illuminate\Database\SQLiteDatabaseDoesNotExistException
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function connect(array $config)
    {
        $options = $this->getOptions($config);

        // SQLite supports "in-memory" databases that only last as long as the owning
        // connection does. These are useful for tests or for short lifetime store
        // querying. In-memory databases may only have a single open connection.
        if ($config['database'] === ':memory:') {
            return $this->createConnection('sqlite::memory:', $config, $options);
        }

        $path = realpath($config['database']);

        // Here we'll verify that the SQLite database exists before going any further
        // as the developer probably wants to know if the database exists and this
        // SQLite driver will not throw any exception if it does not by default.
        if ($path === false) {
<<<<<<< HEAD
            throw new InvalidArgumentException("Database ({$config['database']}) does not exist.");
=======
            throw new SQLiteDatabaseDoesNotExistException($config['database']);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        return $this->createConnection("sqlite:{$path}", $config, $options);
    }
}
