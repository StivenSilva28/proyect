<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Test;

<<<<<<< HEAD
=======
use PHPUnit\Framework\MockObject\MockObject;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\Translation\Dumper\XliffFileDumper;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\Provider\ProviderInterface;
<<<<<<< HEAD
=======
use Symfony\Component\Translation\TranslatorBagInterface;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * A test case to ease testing a translation provider.
 *
 * @author Mathieu Santostefano <msantostefano@protonmail.com>
 *
 * @internal
 */
abstract class ProviderTestCase extends TestCase
{
<<<<<<< HEAD
    protected $client;
    protected $logger;
    protected $defaultLocale;
    protected $loader;
    protected $xliffFileDumper;
=======
    protected HttpClientInterface $client;
    protected LoggerInterface|MockObject $logger;
    protected string $defaultLocale;
    protected LoaderInterface|MockObject $loader;
    protected XliffFileDumper|MockObject $xliffFileDumper;
    protected TranslatorBagInterface|MockObject $translatorBag;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    abstract public function createProvider(HttpClientInterface $client, LoaderInterface $loader, LoggerInterface $logger, string $defaultLocale, string $endpoint): ProviderInterface;

    /**
     * @return iterable<array{0: string, 1: ProviderInterface}>
     */
    abstract public function toStringProvider(): iterable;

    /**
     * @dataProvider toStringProvider
     */
    public function testToString(ProviderInterface $provider, string $expected)
    {
        $this->assertSame($expected, (string) $provider);
    }

    protected function getClient(): MockHttpClient
    {
<<<<<<< HEAD
        return $this->client ?? $this->client = new MockHttpClient();
=======
        return $this->client ??= new MockHttpClient();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    protected function getLoader(): LoaderInterface
    {
<<<<<<< HEAD
        return $this->loader ?? $this->loader = $this->createMock(LoaderInterface::class);
=======
        return $this->loader ??= $this->createMock(LoaderInterface::class);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    protected function getLogger(): LoggerInterface
    {
<<<<<<< HEAD
        return $this->logger ?? $this->logger = $this->createMock(LoggerInterface::class);
=======
        return $this->logger ??= $this->createMock(LoggerInterface::class);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    protected function getDefaultLocale(): string
    {
<<<<<<< HEAD
        return $this->defaultLocale ?? $this->defaultLocale = 'en';
=======
        return $this->defaultLocale ??= 'en';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    protected function getXliffFileDumper(): XliffFileDumper
    {
<<<<<<< HEAD
        return $this->xliffFileDumper ?? $this->xliffFileDumper = $this->createMock(XliffFileDumper::class);
=======
        return $this->xliffFileDumper ??= $this->createMock(XliffFileDumper::class);
    }

    protected function getTranslatorBag(): TranslatorBagInterface
    {
        return $this->translatorBag ??= $this->createMock(TranslatorBagInterface::class);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
