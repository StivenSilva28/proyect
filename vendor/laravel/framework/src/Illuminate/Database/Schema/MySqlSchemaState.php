<?php

namespace Illuminate\Database\Schema;

use Exception;
use Illuminate\Database\Connection;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class MySqlSchemaState extends SchemaState
{
    /**
     * Dump the database's schema into a file.
     *
     * @param  \Illuminate\Database\Connection  $connection
     * @param  string  $path
     * @return void
     */
    public function dump(Connection $connection, $path)
    {
        $this->executeDumpProcess($this->makeProcess(
            $this->baseDumpCommand().' --routines --result-file="${:LARAVEL_LOAD_PATH}" --no-data'
        ), $this->output, array_merge($this->baseVariables($this->connection->getConfig()), [
            'LARAVEL_LOAD_PATH' => $path,
        ]));

        $this->removeAutoIncrementingState($path);

        $this->appendMigrationData($path);
    }

    /**
     * Remove the auto-incrementing state from the given schema dump.
     *
     * @param  string  $path
     * @return void
     */
    protected function removeAutoIncrementingState(string $path)
    {
        $this->files->put($path, preg_replace(
            '/\s+AUTO_INCREMENT=[0-9]+/iu',
            '',
            $this->files->get($path)
        ));
    }

    /**
     * Append the migration data to the schema dump.
     *
     * @param  string  $path
     * @return void
     */
    protected function appendMigrationData(string $path)
    {
        $process = $this->executeDumpProcess($this->makeProcess(
            $this->baseDumpCommand().' '.$this->migrationTable.' --no-create-info --skip-extended-insert --skip-routines --compact'
        ), null, array_merge($this->baseVariables($this->connection->getConfig()), [
            //
        ]));

        $this->files->append($path, $process->getOutput());
    }

    /**
     * Load the given schema file into the database.
     *
     * @param  string  $path
     * @return void
     */
    public function load($path)
    {
        $command = 'mysql '.$this->connectionString().' --database="${:LARAVEL_LOAD_DATABASE}" < "${:LARAVEL_LOAD_PATH}"';

        $process = $this->makeProcess($command)->setTimeout(null);

        $process->mustRun(null, array_merge($this->baseVariables($this->connection->getConfig()), [
            'LARAVEL_LOAD_PATH' => $path,
        ]));
    }

    /**
     * Get the base dump command arguments for MySQL as a string.
     *
     * @return string
     */
    protected function baseDumpCommand()
    {
        $command = 'mysqldump '.$this->connectionString().' --no-tablespaces --skip-add-locks --skip-comments --skip-set-charset --tz-utc --column-statistics=0';

        if (! $this->connection->isMaria()) {
            $command .= ' --set-gtid-purged=OFF';
        }

        return $command.' "${:LARAVEL_LOAD_DATABASE}"';
    }

    /**
     * Generate a basic connection string (--socket, --host, --port, --user, --password) for the database.
     *
     * @return string
     */
    protected function connectionString()
    {
        $value = ' --user="${:LARAVEL_LOAD_USER}" --password="${:LARAVEL_LOAD_PASSWORD}"';

<<<<<<< HEAD
        $value .= $this->connection->getConfig()['unix_socket'] ?? false
                        ? ' --socket="${:LARAVEL_LOAD_SOCKET}"'
                        : ' --host="${:LARAVEL_LOAD_HOST}" --port="${:LARAVEL_LOAD_PORT}"';

=======
        $config = $this->connection->getConfig();

        $value .= $config['unix_socket'] ?? false
                        ? ' --socket="${:LARAVEL_LOAD_SOCKET}"'
                        : ' --host="${:LARAVEL_LOAD_HOST}" --port="${:LARAVEL_LOAD_PORT}"';

        if (isset($config['options'][\PDO::MYSQL_ATTR_SSL_CA])) {
            $value .= ' --ssl-ca="${:LARAVEL_LOAD_SSL_CA}"';
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        return $value;
    }

    /**
     * Get the base variables for a dump / load command.
     *
     * @param  array  $config
     * @return array
     */
    protected function baseVariables(array $config)
    {
<<<<<<< HEAD
        $config['host'] = $config['host'] ?? '';
=======
        $config['host'] ??= '';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return [
            'LARAVEL_LOAD_SOCKET' => $config['unix_socket'] ?? '',
            'LARAVEL_LOAD_HOST' => is_array($config['host']) ? $config['host'][0] : $config['host'],
            'LARAVEL_LOAD_PORT' => $config['port'] ?? '',
            'LARAVEL_LOAD_USER' => $config['username'],
            'LARAVEL_LOAD_PASSWORD' => $config['password'] ?? '',
            'LARAVEL_LOAD_DATABASE' => $config['database'],
<<<<<<< HEAD
=======
            'LARAVEL_LOAD_SSL_CA' => $config['options'][\PDO::MYSQL_ATTR_SSL_CA] ?? '',
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        ];
    }

    /**
     * Execute the given dump process.
     *
     * @param  \Symfony\Component\Process\Process  $process
     * @param  callable  $output
     * @param  array  $variables
     * @return \Symfony\Component\Process\Process
     */
    protected function executeDumpProcess(Process $process, $output, array $variables)
    {
        try {
            $process->setTimeout(null)->mustRun($output, $variables);
        } catch (Exception $e) {
            if (Str::contains($e->getMessage(), ['column-statistics', 'column_statistics'])) {
                return $this->executeDumpProcess(Process::fromShellCommandLine(
                    str_replace(' --column-statistics=0', '', $process->getCommandLine())
                ), $output, $variables);
            }

<<<<<<< HEAD
            if (Str::contains($e->getMessage(), ['set-gtid-purged'])) {
=======
            if (str_contains($e->getMessage(), 'set-gtid-purged')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                return $this->executeDumpProcess(Process::fromShellCommandLine(
                    str_replace(' --set-gtid-purged=OFF', '', $process->getCommandLine())
                ), $output, $variables);
            }

            throw $e;
        }

        return $process;
    }
}
