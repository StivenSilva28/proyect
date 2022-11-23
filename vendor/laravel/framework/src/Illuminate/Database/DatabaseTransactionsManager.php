<?php

namespace Illuminate\Database;

class DatabaseTransactionsManager
{
    /**
     * All of the recorded transactions.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $transactions;

    /**
<<<<<<< HEAD
=======
     * The database transaction that should be ignored by callbacks.
     *
     * @var \Illuminate\Database\DatabaseTransactionRecord
     */
    protected $callbacksShouldIgnore;

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Create a new database transactions manager instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->transactions = collect();
    }

    /**
     * Start a new database transaction.
     *
     * @param  string  $connection
     * @param  int  $level
     * @return void
     */
    public function begin($connection, $level)
    {
        $this->transactions->push(
            new DatabaseTransactionRecord($connection, $level)
        );
    }

    /**
     * Rollback the active database transaction.
     *
     * @param  string  $connection
     * @param  int  $level
     * @return void
     */
    public function rollback($connection, $level)
    {
<<<<<<< HEAD
        $this->transactions = $this->transactions->reject(function ($transaction) use ($connection, $level) {
            return $transaction->connection == $connection &&
                   $transaction->level > $level;
        })->values();
=======
        $this->transactions = $this->transactions->reject(
            fn ($transaction) => $transaction->connection == $connection && $transaction->level > $level
        )->values();

        if ($this->transactions->isEmpty()) {
            $this->callbacksShouldIgnore = null;
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Commit the active database transaction.
     *
     * @param  string  $connection
     * @return void
     */
    public function commit($connection)
    {
        [$forThisConnection, $forOtherConnections] = $this->transactions->partition(
<<<<<<< HEAD
            function ($transaction) use ($connection) {
                return $transaction->connection == $connection;
            }
=======
            fn ($transaction) => $transaction->connection == $connection
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        );

        $this->transactions = $forOtherConnections->values();

        $forThisConnection->map->executeCallbacks();
<<<<<<< HEAD
=======

        if ($this->transactions->isEmpty()) {
            $this->callbacksShouldIgnore = null;
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Register a transaction callback.
     *
     * @param  callable  $callback
     * @return void
     */
    public function addCallback($callback)
    {
<<<<<<< HEAD
        if ($current = $this->transactions->last()) {
            return $current->addCallback($callback);
        }

        call_user_func($callback);
=======
        if ($current = $this->callbackApplicableTransactions()->last()) {
            return $current->addCallback($callback);
        }

        $callback();
    }

    /**
     * Specify that callbacks should ignore the given transaction when determining if they should be executed.
     *
     * @param  \Illuminate\Database\DatabaseTransactionRecord  $transaction
     * @return $this
     */
    public function callbacksShouldIgnore(DatabaseTransactionRecord $transaction)
    {
        $this->callbacksShouldIgnore = $transaction;

        return $this;
    }

    /**
     * Get the transactions that are applicable to callbacks.
     *
     * @return \Illuminate\Support\Collection
     */
    public function callbackApplicableTransactions()
    {
        return $this->transactions->reject(function ($transaction) {
            return $transaction === $this->callbacksShouldIgnore;
        })->values();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get all the transactions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}
