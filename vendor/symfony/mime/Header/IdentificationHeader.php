<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Header;

use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Exception\RfcComplianceException;

/**
 * An ID MIME Header for something like Message-ID or Content-ID (one or more addresses).
 *
 * @author Chris Corbyn
 */
final class IdentificationHeader extends AbstractHeader
{
<<<<<<< HEAD
    private $ids = [];
    private $idsAsAddresses = [];

    /**
     * @param string|array $ids
     */
    public function __construct(string $name, $ids)
=======
    private array $ids = [];
    private array $idsAsAddresses = [];

    public function __construct(string $name, string|array $ids)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        parent::__construct($name);

        $this->setId($ids);
    }

    /**
<<<<<<< HEAD
     * @param string|array $body a string ID or an array of IDs
     *
     * @throws RfcComplianceException
     */
    public function setBody($body)
=======
     * @param string|string[] $body a string ID or an array of IDs
     *
     * @throws RfcComplianceException
     */
    public function setBody(mixed $body)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->setId($body);
    }

    public function getBody(): array
    {
        return $this->getIds();
    }

    /**
     * Set the ID used in the value of this header.
     *
<<<<<<< HEAD
     * @param string|array $id
     *
     * @throws RfcComplianceException
     */
    public function setId($id)
=======
     * @param string|string[] $id
     *
     * @throws RfcComplianceException
     */
    public function setId(string|array $id)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->setIds(\is_array($id) ? $id : [$id]);
    }

    /**
     * Get the ID used in the value of this Header.
     *
     * If multiple IDs are set only the first is returned.
     */
    public function getId(): ?string
    {
        return $this->ids[0] ?? null;
    }

    /**
     * Set a collection of IDs to use in the value of this Header.
     *
     * @param string[] $ids
     *
     * @throws RfcComplianceException
     */
    public function setIds(array $ids)
    {
        $this->ids = [];
        $this->idsAsAddresses = [];
        foreach ($ids as $id) {
            $this->idsAsAddresses[] = new Address($id);
            $this->ids[] = $id;
        }
    }

    /**
     * Get the list of IDs used in this Header.
     *
     * @return string[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    public function getBodyAsString(): string
    {
        $addrs = [];
        foreach ($this->idsAsAddresses as $address) {
            $addrs[] = '<'.$address->toString().'>';
        }

        return implode(' ', $addrs);
    }
}
