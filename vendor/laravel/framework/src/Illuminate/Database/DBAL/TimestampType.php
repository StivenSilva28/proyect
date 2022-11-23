<?php

namespace Illuminate\Database\DBAL;

<<<<<<< HEAD
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\PhpDateTimeMappingType;
use Doctrine\DBAL\Types\Type;
use RuntimeException;
=======
use Doctrine\DBAL\Exception as DBALException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\PhpDateTimeMappingType;
use Doctrine\DBAL\Types\Type;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

class TimestampType extends Type implements PhpDateTimeMappingType
{
    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $name = $platform->getName();

        switch ($name) {
            case 'mysql':
            case 'mysql2':
                return $this->getMySqlPlatformSQLDeclaration($fieldDeclaration);

            case 'postgresql':
            case 'pgsql':
            case 'postgres':
                return $this->getPostgresPlatformSQLDeclaration($fieldDeclaration);

            case 'mssql':
                return $this->getSqlServerPlatformSQLDeclaration($fieldDeclaration);

            case 'sqlite':
            case 'sqlite3':
                return $this->getSQLitePlatformSQLDeclaration($fieldDeclaration);

            default:
                throw new RuntimeException('Invalid platform: '.$name);
        }
=======
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return match ($name = $platform->getName()) {
            'mysql',
            'mysql2' => $this->getMySqlPlatformSQLDeclaration($fieldDeclaration),
            'postgresql',
            'pgsql',
            'postgres' => $this->getPostgresPlatformSQLDeclaration($fieldDeclaration),
            'mssql' => $this->getSqlServerPlatformSQLDeclaration($fieldDeclaration),
            'sqlite',
            'sqlite3' => $this->getSQLitePlatformSQLDeclaration($fieldDeclaration),
            default => throw new DBALException('Invalid platform: '.$name),
        };
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get the SQL declaration for MySQL.
     *
     * @param  array  $fieldDeclaration
     * @return string
     */
    protected function getMySqlPlatformSQLDeclaration(array $fieldDeclaration)
    {
        $columnType = 'TIMESTAMP';

        if ($fieldDeclaration['precision']) {
            $columnType = 'TIMESTAMP('.$fieldDeclaration['precision'].')';
        }

        $notNull = $fieldDeclaration['notnull'] ?? false;

        if (! $notNull) {
            return $columnType.' NULL';
        }

        return $columnType;
    }

    /**
     * Get the SQL declaration for PostgreSQL.
     *
     * @param  array  $fieldDeclaration
     * @return string
     */
    protected function getPostgresPlatformSQLDeclaration(array $fieldDeclaration)
    {
        return 'TIMESTAMP('.(int) $fieldDeclaration['precision'].')';
    }

    /**
     * Get the SQL declaration for SQL Server.
     *
     * @param  array  $fieldDeclaration
     * @return string
     */
    protected function getSqlServerPlatformSQLDeclaration(array $fieldDeclaration)
    {
        return $fieldDeclaration['precision'] ?? false
                    ? 'DATETIME2('.$fieldDeclaration['precision'].')'
                    : 'DATETIME';
    }

    /**
     * Get the SQL declaration for SQLite.
     *
     * @param  array  $fieldDeclaration
     * @return string
     */
    protected function getSQLitePlatformSQLDeclaration(array $fieldDeclaration)
    {
        return 'DATETIME';
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getName()
    {
        return 'timestamp';
    }
}