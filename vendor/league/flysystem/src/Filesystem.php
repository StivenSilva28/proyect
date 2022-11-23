<?php

<<<<<<< HEAD
namespace League\Flysystem;

use InvalidArgumentException;
use League\Flysystem\Adapter\CanOverwriteFiles;
use League\Flysystem\Plugin\PluggableTrait;
use League\Flysystem\Util\ContentListingFormatter;

/**
 * @method void        emptyDir(string $dirname)
 * @method array|false getWithMetadata(string $path, string[] $metadata)
 * @method bool        forceCopy(string $path, string $newpath)
 * @method bool        forceRename(string $path, string $newpath)
 * @method array       listFiles(string $path = '', boolean $recursive = false)
 * @method string[]    listPaths(string $path = '', boolean $recursive = false)
 * @method array       listWith(string[] $keys = [], $directory = '', $recursive = false)
 */
class Filesystem implements FilesystemInterface
{
    use PluggableTrait;
    use ConfigAwareTrait;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Constructor.
     *
     * @param AdapterInterface $adapter
     * @param Config|array     $config
     */
    public function __construct(AdapterInterface $adapter, $config = null)
    {
        $this->adapter = $adapter;
        $this->setConfig($config);
    }

    /**
     * Get the Adapter.
     *
     * @return AdapterInterface adapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @inheritdoc
     */
    public function has($path)
    {
        $path = Util::normalizePath($path);

        return strlen($path) === 0 ? false : (bool) $this->getAdapter()->has($path);
    }

    /**
     * @inheritdoc
     */
    public function write($path, $contents, array $config = [])
    {
        $path = Util::normalizePath($path);
        $this->assertAbsent($path);
        $config = $this->prepareConfig($config);

        return (bool) $this->getAdapter()->write($path, $contents, $config);
    }

    /**
     * @inheritdoc
     */
    public function writeStream($path, $resource, array $config = [])
    {
        if ( ! is_resource($resource) || get_resource_type($resource) !== 'stream') {
            throw new InvalidArgumentException(__METHOD__ . ' expects argument #2 to be a valid resource.');
        }

        $path = Util::normalizePath($path);
        $this->assertAbsent($path);
        $config = $this->prepareConfig($config);

        Util::rewindStream($resource);

        return (bool) $this->getAdapter()->writeStream($path, $resource, $config);
    }

    /**
     * @inheritdoc
     */
    public function put($path, $contents, array $config = [])
    {
        $path = Util::normalizePath($path);
        $config = $this->prepareConfig($config);

        if ( ! $this->getAdapter() instanceof CanOverwriteFiles && $this->has($path)) {
            return (bool) $this->getAdapter()->update($path, $contents, $config);
        }

        return (bool) $this->getAdapter()->write($path, $contents, $config);
    }

    /**
     * @inheritdoc
     */
    public function putStream($path, $resource, array $config = [])
    {
        if ( ! is_resource($resource) || get_resource_type($resource) !== 'stream') {
            throw new InvalidArgumentException(__METHOD__ . ' expects argument #2 to be a valid resource.');
        }

        $path = Util::normalizePath($path);
        $config = $this->prepareConfig($config);
        Util::rewindStream($resource);

        if ( ! $this->getAdapter() instanceof CanOverwriteFiles && $this->has($path)) {
            return (bool) $this->getAdapter()->updateStream($path, $resource, $config);
        }

        return (bool) $this->getAdapter()->writeStream($path, $resource, $config);
    }

    /**
     * @inheritdoc
     */
    public function readAndDelete($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);
        $contents = $this->read($path);

        if ($contents === false) {
            return false;
        }

        $this->delete($path);

        return $contents;
    }

    /**
     * @inheritdoc
     */
    public function update($path, $contents, array $config = [])
    {
        $path = Util::normalizePath($path);
        $config = $this->prepareConfig($config);

        $this->assertPresent($path);

        return (bool) $this->getAdapter()->update($path, $contents, $config);
    }

    /**
     * @inheritdoc
     */
    public function updateStream($path, $resource, array $config = [])
    {
        if ( ! is_resource($resource) || get_resource_type($resource) !== 'stream') {
            throw new InvalidArgumentException(__METHOD__ . ' expects argument #2 to be a valid resource.');
        }

        $path = Util::normalizePath($path);
        $config = $this->prepareConfig($config);
        $this->assertPresent($path);
        Util::rewindStream($resource);

        return (bool) $this->getAdapter()->updateStream($path, $resource, $config);
    }

    /**
     * @inheritdoc
     */
    public function read($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        if ( ! ($object = $this->getAdapter()->read($path))) {
            return false;
        }

        return $object['contents'];
    }

    /**
     * @inheritdoc
     */
    public function readStream($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        if ( ! $object = $this->getAdapter()->readStream($path)) {
            return false;
        }

        return $object['stream'];
    }

    /**
     * @inheritdoc
     */
    public function rename($path, $newpath)
    {
        $path = Util::normalizePath($path);
        $newpath = Util::normalizePath($newpath);
        $this->assertPresent($path);
        $this->assertAbsent($newpath);

        return (bool) $this->getAdapter()->rename($path, $newpath);
    }

    /**
     * @inheritdoc
     */
    public function copy($path, $newpath)
    {
        $path = Util::normalizePath($path);
        $newpath = Util::normalizePath($newpath);
        $this->assertPresent($path);
        $this->assertAbsent($newpath);

        return $this->getAdapter()->copy($path, $newpath);
    }

    /**
     * @inheritdoc
     */
    public function delete($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        return $this->getAdapter()->delete($path);
    }

    /**
     * @inheritdoc
     */
    public function deleteDir($dirname)
    {
        $dirname = Util::normalizePath($dirname);

        if ($dirname === '') {
            throw new RootViolationException('Root directories can not be deleted.');
        }

        return (bool) $this->getAdapter()->deleteDir($dirname);
    }

    /**
     * @inheritdoc
     */
    public function createDir($dirname, array $config = [])
    {
        $dirname = Util::normalizePath($dirname);
        $config = $this->prepareConfig($config);

        return (bool) $this->getAdapter()->createDir($dirname, $config);
    }

    /**
     * @inheritdoc
     */
    public function listContents($directory = '', $recursive = false)
    {
        $directory = Util::normalizePath($directory);
        $contents = $this->getAdapter()->listContents($directory, $recursive);

        return (new ContentListingFormatter($directory, $recursive, $this->config->get('case_sensitive', true)))
            ->formatListing($contents);
    }

    /**
     * @inheritdoc
     */
    public function getMimetype($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        if (( ! $object = $this->getAdapter()->getMimetype($path)) || ! array_key_exists('mimetype', $object)) {
            return false;
        }

        return $object['mimetype'];
    }

    /**
     * @inheritdoc
     */
    public function getTimestamp($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        if (( ! $object = $this->getAdapter()->getTimestamp($path)) || ! array_key_exists('timestamp', $object)) {
            return false;
        }

        return (int) $object['timestamp'];
    }

    /**
     * @inheritdoc
     */
    public function getVisibility($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        if (( ! $object = $this->getAdapter()->getVisibility($path)) || ! array_key_exists('visibility', $object)) {
            return false;
        }

        return $object['visibility'];
    }

    /**
     * @inheritdoc
     */
    public function getSize($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        if (( ! $object = $this->getAdapter()->getSize($path)) || ! array_key_exists('size', $object)) {
            return false;
        }

        return (int) $object['size'];
    }

    /**
     * @inheritdoc
     */
    public function setVisibility($path, $visibility)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        return (bool) $this->getAdapter()->setVisibility($path, $visibility);
    }

    /**
     * @inheritdoc
     */
    public function getMetadata($path)
    {
        $path = Util::normalizePath($path);
        $this->assertPresent($path);

        return $this->getAdapter()->getMetadata($path);
    }

    /**
     * @inheritdoc
     */
    public function get($path, Handler $handler = null)
    {
        $path = Util::normalizePath($path);

        if ( ! $handler) {
            $metadata = $this->getMetadata($path);
            $handler = ($metadata && $metadata['type'] === 'file') ? new File($this, $path) : new Directory($this, $path);
        }

        $handler->setPath($path);
        $handler->setFilesystem($this);

        return $handler;
    }

    /**
     * Assert a file is present.
     *
     * @param string $path path to file
     *
     * @throws FileNotFoundException
     *
     * @return void
     */
    public function assertPresent($path)
    {
        if ($this->config->get('disable_asserts', false) === false && ! $this->has($path)) {
            throw new FileNotFoundException($path);
=======
declare(strict_types=1);

namespace League\Flysystem;

use DateTimeInterface;
use Generator;
use League\Flysystem\UrlGeneration\ShardedPrefixPublicUrlGenerator;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;
use League\Flysystem\UrlGeneration\TemporaryUrlGenerator;
use Throwable;

use function is_array;

class Filesystem implements FilesystemOperator
{
    use CalculateChecksumFromStream;

    private Config $config;
    private PathNormalizer $pathNormalizer;

    public function __construct(
        private FilesystemAdapter $adapter,
        array $config = [],
        PathNormalizer $pathNormalizer = null,
        private ?PublicUrlGenerator $publicUrlGenerator = null,
        private ?TemporaryUrlGenerator $temporaryUrlGenerator = null,
    ) {
        $this->config = new Config($config);
        $this->pathNormalizer = $pathNormalizer ?: new WhitespacePathNormalizer();
    }

    public function fileExists(string $location): bool
    {
        return $this->adapter->fileExists($this->pathNormalizer->normalizePath($location));
    }

    public function directoryExists(string $location): bool
    {
        return $this->adapter->directoryExists($this->pathNormalizer->normalizePath($location));
    }

    public function has(string $location): bool
    {
        $path = $this->pathNormalizer->normalizePath($location);

        return $this->adapter->fileExists($path) || $this->adapter->directoryExists($path);
    }

    public function write(string $location, string $contents, array $config = []): void
    {
        $this->adapter->write(
            $this->pathNormalizer->normalizePath($location),
            $contents,
            $this->config->extend($config)
        );
    }

    public function writeStream(string $location, $contents, array $config = []): void
    {
        /* @var resource $contents */
        $this->assertIsResource($contents);
        $this->rewindStream($contents);
        $this->adapter->writeStream(
            $this->pathNormalizer->normalizePath($location),
            $contents,
            $this->config->extend($config)
        );
    }

    public function read(string $location): string
    {
        return $this->adapter->read($this->pathNormalizer->normalizePath($location));
    }

    public function readStream(string $location)
    {
        return $this->adapter->readStream($this->pathNormalizer->normalizePath($location));
    }

    public function delete(string $location): void
    {
        $this->adapter->delete($this->pathNormalizer->normalizePath($location));
    }

    public function deleteDirectory(string $location): void
    {
        $this->adapter->deleteDirectory($this->pathNormalizer->normalizePath($location));
    }

    public function createDirectory(string $location, array $config = []): void
    {
        $this->adapter->createDirectory(
            $this->pathNormalizer->normalizePath($location),
            $this->config->extend($config)
        );
    }

    public function listContents(string $location, bool $deep = self::LIST_SHALLOW): DirectoryListing
    {
        $path = $this->pathNormalizer->normalizePath($location);
        $listing = $this->adapter->listContents($path, $deep);

        return new DirectoryListing($this->pipeListing($location, $deep, $listing));
    }

    private function pipeListing(string $location, bool $deep, iterable $listing): Generator
    {
        try {
            foreach ($listing as $item) {
                yield $item;
            }
        } catch (Throwable $exception) {
            throw UnableToListContents::atLocation($location, $deep, $exception);
        }
    }

    public function move(string $source, string $destination, array $config = []): void
    {
        $this->adapter->move(
            $this->pathNormalizer->normalizePath($source),
            $this->pathNormalizer->normalizePath($destination),
            $this->config->extend($config)
        );
    }

    public function copy(string $source, string $destination, array $config = []): void
    {
        $this->adapter->copy(
            $this->pathNormalizer->normalizePath($source),
            $this->pathNormalizer->normalizePath($destination),
            $this->config->extend($config)
        );
    }

    public function lastModified(string $path): int
    {
        return $this->adapter->lastModified($this->pathNormalizer->normalizePath($path))->lastModified();
    }

    public function fileSize(string $path): int
    {
        return $this->adapter->fileSize($this->pathNormalizer->normalizePath($path))->fileSize();
    }

    public function mimeType(string $path): string
    {
        return $this->adapter->mimeType($this->pathNormalizer->normalizePath($path))->mimeType();
    }

    public function setVisibility(string $path, string $visibility): void
    {
        $this->adapter->setVisibility($this->pathNormalizer->normalizePath($path), $visibility);
    }

    public function visibility(string $path): string
    {
        return $this->adapter->visibility($this->pathNormalizer->normalizePath($path))->visibility();
    }

    public function publicUrl(string $path, array $config = []): string
    {
        $this->publicUrlGenerator ??= $this->resolvePublicUrlGenerator()
            ?: throw UnableToGeneratePublicUrl::noGeneratorConfigured($path);
        $config = $this->config->extend($config);

        return $this->publicUrlGenerator->publicUrl($path, $config);
    }

    public function temporaryUrl(string $path, DateTimeInterface $expiresAt, array $config = []): string
    {
        $generator = $this->temporaryUrlGenerator ?: $this->adapter;

        if ($generator instanceof TemporaryUrlGenerator) {
            return $generator->temporaryUrl($path, $expiresAt, $this->config->extend($config));
        }

        throw UnableToGenerateTemporaryUrl::noGeneratorConfigured($path);
    }

    public function checksum(string $path, array $config = []): string
    {
        $config = $this->config->extend($config);

        if ( ! $this->adapter instanceof ChecksumProvider) {
            return $this->calculateChecksumFromStream($path, $config);
        }

        try {
            return $this->adapter->checksum($path, $config);
        } catch (ChecksumAlgoIsNotSupported) {
            return $this->calculateChecksumFromStream($path, $config);
        }
    }

    private function resolvePublicUrlGenerator(): ?PublicUrlGenerator
    {
        if ($publicUrl = $this->config->get('public_url')) {
            return match (true) {
                is_array($publicUrl) => new ShardedPrefixPublicUrlGenerator($publicUrl),
                default => new PrefixPublicUrlGenerator($publicUrl),
            };
        }

        if ($this->adapter instanceof PublicUrlGenerator) {
            return $this->adapter;
        }

        return null;
    }

    /**
     * @param mixed $contents
     */
    private function assertIsResource($contents): void
    {
        if (is_resource($contents) === false) {
            throw new InvalidStreamProvided(
                "Invalid stream provided, expected stream resource, received " . gettype($contents)
            );
        } elseif ($type = get_resource_type($contents) !== 'stream') {
            throw new InvalidStreamProvided(
                "Invalid stream provided, expected stream resource, received resource of type " . $type
            );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }

    /**
<<<<<<< HEAD
     * Assert a file is absent.
     *
     * @param string $path path to file
     *
     * @throws FileExistsException
     *
     * @return void
     */
    public function assertAbsent($path)
    {
        if ($this->config->get('disable_asserts', false) === false && $this->has($path)) {
            throw new FileExistsException($path);
=======
     * @param resource $resource
     */
    private function rewindStream($resource): void
    {
        if (ftell($resource) !== 0 && stream_get_meta_data($resource)['seekable']) {
            rewind($resource);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }
}
