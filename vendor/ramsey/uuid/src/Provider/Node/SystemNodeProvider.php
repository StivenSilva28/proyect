<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Uuid\Provider\Node;

use Ramsey\Uuid\Exception\NodeException;
use Ramsey\Uuid\Provider\NodeProviderInterface;
use Ramsey\Uuid\Type\Hexadecimal;

use function array_filter;
use function array_map;
use function array_walk;
use function count;
use function ob_get_clean;
use function ob_start;
use function preg_match;
use function preg_match_all;
use function reset;
<<<<<<< HEAD
use function str_replace;
use function strpos;
=======
use function str_contains;
use function str_replace;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use function strtolower;
use function strtoupper;
use function substr;

use const GLOB_NOSORT;
use const PREG_PATTERN_ORDER;

/**
 * SystemNodeProvider retrieves the system node ID, if possible
 *
 * The system node ID, or host ID, is often the same as the MAC address for a
 * network interface on the host.
 */
class SystemNodeProvider implements NodeProviderInterface
{
    /**
     * Pattern to match nodes in ifconfig and ipconfig output.
     */
    private const IFCONFIG_PATTERN = '/[^:]([0-9a-f]{2}([:-])[0-9a-f]{2}(\2[0-9a-f]{2}){4})[^:]/i';

    /**
     * Pattern to match nodes in sysfs stream output.
     */
    private const SYSFS_PATTERN = '/^([0-9a-f]{2}:){5}[0-9a-f]{2}$/i';

    public function getNode(): Hexadecimal
    {
        $node = $this->getNodeFromSystem();

        if ($node === '') {
            throw new NodeException(
                'Unable to fetch a node for this system'
            );
        }

        return new Hexadecimal($node);
    }

    /**
     * Returns the system node, if it can find it
     */
    protected function getNodeFromSystem(): string
    {
        static $node = null;

        if ($node !== null) {
            return (string) $node;
        }

        // First, try a Linux-specific approach.
        $node = $this->getSysfs();

        if ($node === '') {
            // Search ifconfig output for MAC addresses & return the first one.
            $node = $this->getIfconfig();
        }

        $node = str_replace([':', '-'], '', $node);

        return $node;
    }

    /**
     * Returns the network interface configuration for the system
     *
     * @codeCoverageIgnore
     */
    protected function getIfconfig(): string
    {
        $disabledFunctions = strtolower((string) ini_get('disable_functions'));

<<<<<<< HEAD
        if (strpos($disabledFunctions, 'passthru') !== false) {
            return '';
        }

        ob_start();
        switch (strtoupper(substr(constant('PHP_OS'), 0, 3))) {
=======
        if (str_contains($disabledFunctions, 'passthru')) {
            return '';
        }

        /**
         * @psalm-suppress UnnecessaryVarAnnotation
         * @var string $phpOs
         */
        $phpOs = constant('PHP_OS');

        ob_start();
        switch (strtoupper(substr($phpOs, 0, 3))) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            case 'WIN':
                passthru('ipconfig /all 2>&1');

                break;
            case 'DAR':
                passthru('ifconfig 2>&1');

                break;
            case 'FRE':
                passthru('netstat -i -f link 2>&1');

                break;
            case 'LIN':
            default:
                passthru('netstat -ie 2>&1');

                break;
        }

        $ifconfig = (string) ob_get_clean();

        $node = '';
        if (preg_match_all(self::IFCONFIG_PATTERN, $ifconfig, $matches, PREG_PATTERN_ORDER)) {
            $node = $matches[1][0] ?? '';
        }

        return $node;
    }

    /**
     * Returns MAC address from the first system interface via the sysfs interface
     */
    protected function getSysfs(): string
    {
        $mac = '';

<<<<<<< HEAD
        if (strtoupper(constant('PHP_OS')) === 'LINUX') {
=======
        /**
         * @psalm-suppress UnnecessaryVarAnnotation
         * @var string $phpOs
         */
        $phpOs = constant('PHP_OS');

        if (strtoupper($phpOs) === 'LINUX') {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $addressPaths = glob('/sys/class/net/*/address', GLOB_NOSORT);

            if ($addressPaths === false || count($addressPaths) === 0) {
                return '';
            }

<<<<<<< HEAD
=======
            /** @var array<array-key, string> $macs */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $macs = [];

            array_walk($addressPaths, function (string $addressPath) use (&$macs): void {
                if (is_readable($addressPath)) {
                    $macs[] = file_get_contents($addressPath);
                }
            });

<<<<<<< HEAD
            $macs = array_map('trim', $macs);
=======
            /** @var callable $trim */
            $trim = 'trim';

            $macs = array_map($trim, $macs);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

            // Remove invalid entries.
            $macs = array_filter($macs, function (string $address) {
                return $address !== '00:00:00:00:00:00'
                    && preg_match(self::SYSFS_PATTERN, $address);
            });

<<<<<<< HEAD
=======
            /** @var string|bool $mac */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $mac = reset($macs);
        }

        return (string) $mac;
    }
}
