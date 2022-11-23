<?php

namespace Illuminate\Database\PDO\Concerns;

use Illuminate\Database\PDO\Connection;
use InvalidArgumentException;
use PDO;

trait ConnectsToDatabase
{
    /**
     * Create a new database connection.
     *
<<<<<<< HEAD
     * @param  array  $params
=======
     * @param  mixed[]  $params
     * @param  string|null  $username
     * @param  string|null  $password
     * @param  mixed[]  $driverOptions
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return \Illuminate\Database\PDO\Connection
     *
     * @throws \InvalidArgumentException
     */
<<<<<<< HEAD
    public function connect(array $params)
=======
    public function connect(array $params, $username = null, $password = null, array $driverOptions = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (! isset($params['pdo']) || ! $params['pdo'] instanceof PDO) {
            throw new InvalidArgumentException('Laravel requires the "pdo" property to be set and be a PDO instance.');
        }

        return new Connection($params['pdo']);
    }
}
