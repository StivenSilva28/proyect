<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Component\Config\Resource\ResourceInterface;

/**
 * MessageCatalogueInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface MessageCatalogueInterface
{
    public const INTL_DOMAIN_SUFFIX = '+intl-icu';

    /**
     * Gets the catalogue locale.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getLocale();

    /**
     * Gets the domains.
     *
     * @return array
     */
    public function getDomains();
=======
     */
    public function getLocale(): string;

    /**
     * Gets the domains.
     */
    public function getDomains(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets the messages within a given domain.
     *
     * If $domain is null, it returns all messages.
     *
     * @param string $domain The domain name
<<<<<<< HEAD
     *
     * @return array
     */
    public function all(string $domain = null);
=======
     */
    public function all(string $domain = null): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets a message translation.
     *
     * @param string $id          The message id
     * @param string $translation The messages translation
     * @param string $domain      The domain name
     */
    public function set(string $id, string $translation, string $domain = 'messages');

    /**
     * Checks if a message has a translation.
     *
     * @param string $id     The message id
     * @param string $domain The domain name
<<<<<<< HEAD
     *
     * @return bool
     */
    public function has(string $id, string $domain = 'messages');
=======
     */
    public function has(string $id, string $domain = 'messages'): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Checks if a message has a translation (it does not take into account the fallback mechanism).
     *
     * @param string $id     The message id
     * @param string $domain The domain name
<<<<<<< HEAD
     *
     * @return bool
     */
    public function defines(string $id, string $domain = 'messages');
=======
     */
    public function defines(string $id, string $domain = 'messages'): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets a message translation.
     *
     * @param string $id     The message id
     * @param string $domain The domain name
<<<<<<< HEAD
     *
     * @return string
     */
    public function get(string $id, string $domain = 'messages');
=======
     */
    public function get(string $id, string $domain = 'messages'): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets translations for a given domain.
     *
     * @param array  $messages An array of translations
     * @param string $domain   The domain name
     */
    public function replace(array $messages, string $domain = 'messages');

    /**
     * Adds translations for a given domain.
     *
     * @param array  $messages An array of translations
     * @param string $domain   The domain name
     */
    public function add(array $messages, string $domain = 'messages');

    /**
     * Merges translations from the given Catalogue into the current one.
     *
     * The two catalogues must have the same locale.
     */
    public function addCatalogue(self $catalogue);

    /**
     * Merges translations from the given Catalogue into the current one
     * only when the translation does not exist.
     *
     * This is used to provide default translations when they do not exist for the current locale.
     */
    public function addFallbackCatalogue(self $catalogue);

    /**
     * Gets the fallback catalogue.
<<<<<<< HEAD
     *
     * @return self|null
     */
    public function getFallbackCatalogue();
=======
     */
    public function getFallbackCatalogue(): ?self;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns an array of resources loaded to build this collection.
     *
     * @return ResourceInterface[]
     */
<<<<<<< HEAD
    public function getResources();
=======
    public function getResources(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Adds a resource for this collection.
     */
    public function addResource(ResourceInterface $resource);
}
