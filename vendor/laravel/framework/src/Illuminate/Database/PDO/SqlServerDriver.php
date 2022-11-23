<?php

namespace Illuminate\Database\PDO;

use Doctrine\DBAL\Driver\AbstractSQLServerDriver;

class SqlServerDriver extends AbstractSQLServerDriver
{
    /**
<<<<<<< HEAD
     * @return \Doctrine\DBAL\Driver\Connection
     */
    public function connect(array $params)
=======
     * Create a new database connection.
     *
     * @param  mixed[]  $params
     * @param  string|null  $username
     * @param  string|null  $password
     * @param  mixed[]  $driverOptions
     * @return \Illuminate\Database\PDO\SqlServerConnection
     */
    public function connect(array $params, $username = null, $password = null, array $driverOptions = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new SqlServerConnection(
            new Connection($params['pdo'])
        );
    }
<<<<<<< HEAD
=======

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pdo_sqlsrv';
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
