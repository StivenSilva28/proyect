<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

use MongoDB\BSON\Binary;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Client;
use MongoDB\Collection;

/**
 * Session handler using the mongodb/mongodb package and MongoDB driver extension.
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
 *
 * @see https://packagist.org/packages/mongodb/mongodb
 * @see https://php.net/mongodb
 */
class MongoDbSessionHandler extends AbstractSessionHandler
{
<<<<<<< HEAD
    private $mongo;

    /**
     * @var Collection
     */
    private $collection;

    /**
     * @var array
     */
    private $options;
=======
    private Client $mongo;
    private Collection $collection;
    private array $options;
    private int|\Closure|null $ttl;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Constructor.
     *
     * List of available options:
     *  * database: The name of the database [required]
     *  * collection: The name of the collection [required]
     *  * id_field: The field name for storing the session id [default: _id]
     *  * data_field: The field name for storing the session data [default: data]
     *  * time_field: The field name for storing the timestamp [default: time]
<<<<<<< HEAD
     *  * expiry_field: The field name for storing the expiry-timestamp [default: expires_at].
=======
     *  * expiry_field: The field name for storing the expiry-timestamp [default: expires_at]
     *  * ttl: The time to live in seconds.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * It is strongly recommended to put an index on the `expiry_field` for
     * garbage-collection. Alternatively it's possible to automatically expire
     * the sessions in the database as described below:
     *
     * A TTL collections can be used on MongoDB 2.2+ to cleanup expired sessions
     * automatically. Such an index can for example look like this:
     *
     *     db.<session-collection>.createIndex(
     *         { "<expiry-field>": 1 },
     *         { "expireAfterSeconds": 0 }
     *     )
     *
     * More details on: https://docs.mongodb.org/manual/tutorial/expire-data/
     *
     * If you use such an index, you can drop `gc_probability` to 0 since
     * no garbage-collection is required.
     *
     * @throws \InvalidArgumentException When "database" or "collection" not provided
     */
    public function __construct(Client $mongo, array $options)
    {
        if (!isset($options['database']) || !isset($options['collection'])) {
            throw new \InvalidArgumentException('You must provide the "database" and "collection" option for MongoDBSessionHandler.');
        }

        $this->mongo = $mongo;

        $this->options = array_merge([
            'id_field' => '_id',
            'data_field' => 'data',
            'time_field' => 'time',
            'expiry_field' => 'expires_at',
        ], $options);
<<<<<<< HEAD
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function close()
=======
        $this->ttl = $this->options['ttl'] ?? null;
    }

    public function close(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doDestroy(string $sessionId)
=======
    protected function doDestroy(string $sessionId): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->getCollection()->deleteOne([
            $this->options['id_field'] => $sessionId,
        ]);

        return true;
    }

<<<<<<< HEAD
    /**
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
=======
    public function gc(int $maxlifetime): int|false
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->getCollection()->deleteMany([
            $this->options['expiry_field'] => ['$lt' => new UTCDateTime()],
        ])->getDeletedCount();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doWrite(string $sessionId, string $data)
    {
        $expiry = new UTCDateTime((time() + (int) \ini_get('session.gc_maxlifetime')) * 1000);
=======
    protected function doWrite(string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $expiry = new UTCDateTime((time() + (int) $ttl) * 1000);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        $fields = [
            $this->options['time_field'] => new UTCDateTime(),
            $this->options['expiry_field'] => $expiry,
            $this->options['data_field'] => new Binary($data, Binary::TYPE_OLD_BINARY),
        ];

        $this->getCollection()->updateOne(
            [$this->options['id_field'] => $sessionId],
            ['$set' => $fields],
            ['upsert' => true]
        );

        return true;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function updateTimestamp($sessionId, $data)
    {
        $expiry = new UTCDateTime((time() + (int) \ini_get('session.gc_maxlifetime')) * 1000);
=======
    public function updateTimestamp(string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $expiry = new UTCDateTime((time() + (int) $ttl) * 1000);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        $this->getCollection()->updateOne(
            [$this->options['id_field'] => $sessionId],
            ['$set' => [
                $this->options['time_field'] => new UTCDateTime(),
                $this->options['expiry_field'] => $expiry,
            ]]
        );

        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doRead(string $sessionId)
=======
    protected function doRead(string $sessionId): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $dbData = $this->getCollection()->findOne([
            $this->options['id_field'] => $sessionId,
            $this->options['expiry_field'] => ['$gte' => new UTCDateTime()],
        ]);

        if (null === $dbData) {
            return '';
        }

        return $dbData[$this->options['data_field']]->getData();
    }

    private function getCollection(): Collection
    {
<<<<<<< HEAD
        if (null === $this->collection) {
            $this->collection = $this->mongo->selectCollection($this->options['database'], $this->options['collection']);
        }

        return $this->collection;
    }

    /**
     * @return Client
     */
    protected function getMongo()
=======
        return $this->collection ??= $this->mongo->selectCollection($this->options['database'], $this->options['collection']);
    }

    protected function getMongo(): Client
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->mongo;
    }
}
