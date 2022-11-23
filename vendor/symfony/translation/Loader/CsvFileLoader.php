<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * CsvFileLoader loads translations from CSV files.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class CsvFileLoader extends FileLoader
{
<<<<<<< HEAD
    private $delimiter = ';';
    private $enclosure = '"';
    private $escape = '\\';
=======
    private string $delimiter = ';';
    private string $enclosure = '"';
    private string $escape = '\\';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function loadResource(string $resource)
=======
    protected function loadResource(string $resource): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $messages = [];

        try {
            $file = new \SplFileObject($resource, 'rb');
        } catch (\RuntimeException $e) {
            throw new NotFoundResourceException(sprintf('Error opening file "%s".', $resource), 0, $e);
        }

        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);
        $file->setCsvControl($this->delimiter, $this->enclosure, $this->escape);

        foreach ($file as $data) {
            if (false === $data) {
                continue;
            }

<<<<<<< HEAD
            if ('#' !== substr($data[0], 0, 1) && isset($data[1]) && 2 === \count($data)) {
=======
            if (!str_starts_with($data[0], '#') && isset($data[1]) && 2 === \count($data)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $messages[$data[0]] = $data[1];
            }
        }

        return $messages;
    }

    /**
     * Sets the delimiter, enclosure, and escape character for CSV.
     */
    public function setCsvControl(string $delimiter = ';', string $enclosure = '"', string $escape = '\\')
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape = $escape;
    }
}
