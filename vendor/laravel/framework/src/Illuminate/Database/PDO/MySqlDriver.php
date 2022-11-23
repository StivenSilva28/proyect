<?php

namespace Illuminate\Database\PDO;

use Doctrine\DBAL\Driver\AbstractMySQLDriver;
use Illuminate\Database\PDO\Concerns\ConnectsToDatabase;

class MySqlDriver extends AbstractMySQLDriver
{
    use ConnectsToDatabase;
<<<<<<< HEAD
=======

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pdo_mysql';
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
