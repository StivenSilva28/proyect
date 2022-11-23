<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\MessageIDValidation;
use Egulias\EmailValidator\Validation\RFCValidation;
use Symfony\Component\Mime\Encoder\IdnAddressEncoder;
use Symfony\Component\Mime\Exception\InvalidArgumentException;
use Symfony\Component\Mime\Exception\LogicException;
use Symfony\Component\Mime\Exception\RfcComplianceException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class Address
{
    /**
     * A regex that matches a structure like 'Name <email@address.com>'.
     * It matches anything between the first < and last > as email address.
     * This allows to use a single string to construct an Address, which can be convenient to use in
     * config, and allows to have more readable config.
     * This does not try to cover all edge cases for address.
     */
    private const FROM_STRING_PATTERN = '~(?<displayName>[^<]*)<(?<addrSpec>.*)>[^>]*~';

<<<<<<< HEAD
    private static $validator;
    private static $encoder;

    private $address;
    private $name;
=======
    private static EmailValidator $validator;
    private static IdnAddressEncoder $encoder;

    private string $address;
    private string $name;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $address, string $name = '')
    {
        if (!class_exists(EmailValidator::class)) {
            throw new LogicException(sprintf('The "%s" class cannot be used as it needs "%s"; try running "composer require egulias/email-validator".', __CLASS__, EmailValidator::class));
        }

<<<<<<< HEAD
        if (null === self::$validator) {
            self::$validator = new EmailValidator();
        }
=======
        self::$validator ??= new EmailValidator();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        $this->address = trim($address);
        $this->name = trim(str_replace(["\n", "\r"], '', $name));

        if (!self::$validator->isValid($this->address, class_exists(MessageIDValidation::class) ? new MessageIDValidation() : new RFCValidation())) {
            throw new RfcComplianceException(sprintf('Email "%s" does not comply with addr-spec of RFC 2822.', $address));
        }
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEncodedAddress(): string
    {
<<<<<<< HEAD
        if (null === self::$encoder) {
            self::$encoder = new IdnAddressEncoder();
        }
=======
        self::$encoder ??= new IdnAddressEncoder();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return self::$encoder->encodeString($this->address);
    }

    public function toString(): string
    {
        return ($n = $this->getEncodedName()) ? $n.' <'.$this->getEncodedAddress().'>' : $this->getEncodedAddress();
    }

    public function getEncodedName(): string
    {
        if ('' === $this->getName()) {
            return '';
        }

        return sprintf('"%s"', preg_replace('/"/u', '\"', $this->getName()));
    }

<<<<<<< HEAD
    /**
     * @param Address|string $address
     */
    public static function create($address): self
=======
    public static function create(self|string $address): self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($address instanceof self) {
            return $address;
        }

<<<<<<< HEAD
        if (!\is_string($address)) {
            throw new InvalidArgumentException(sprintf('An address can be an instance of Address or a string ("%s" given).', get_debug_type($address)));
        }

        if (false === strpos($address, '<')) {
=======
        if (!str_contains($address, '<')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return new self($address);
        }

        if (!preg_match(self::FROM_STRING_PATTERN, $address, $matches)) {
            throw new InvalidArgumentException(sprintf('Could not parse "%s" to a "%s" instance.', $address, self::class));
        }

        return new self($matches['addrSpec'], trim($matches['displayName'], ' \'"'));
    }

    /**
     * @param array<Address|string> $addresses
     *
     * @return Address[]
     */
    public static function createArray(array $addresses): array
    {
        $addrs = [];
        foreach ($addresses as $address) {
            $addrs[] = self::create($address);
        }

        return $addrs;
    }
<<<<<<< HEAD

    /**
     * @deprecated since Symfony 5.2, use "create()" instead.
     */
    public static function fromString(string $string): self
    {
        trigger_deprecation('symfony/mime', '5.2', '"%s()" is deprecated, use "%s::create()" instead.', __METHOD__, __CLASS__);

        if (!str_contains($string, '<')) {
            return new self($string, '');
        }

        if (!preg_match(self::FROM_STRING_PATTERN, $string, $matches)) {
            throw new InvalidArgumentException(sprintf('Could not parse "%s" to a "%s" instance.', $string, self::class));
        }

        return new self($matches['addrSpec'], trim($matches['displayName'], ' \'"'));
    }
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}