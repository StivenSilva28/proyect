<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Dumper;

use Symfony\Component\Translation\Loader\MoFileLoader;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * MoFileDumper generates a gettext formatted string representation of a message catalogue.
 *
 * @author Stealth35
 */
class MoFileDumper extends FileDumper
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = [])
=======
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = []): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $sources = $targets = $sourceOffsets = $targetOffsets = '';
        $offsets = [];
        $size = 0;

        foreach ($messages->all($domain) as $source => $target) {
            $offsets[] = array_map('strlen', [$sources, $source, $targets, $target]);
            $sources .= "\0".$source;
            $targets .= "\0".$target;
            ++$size;
        }

        $header = [
            'magicNumber' => MoFileLoader::MO_LITTLE_ENDIAN_MAGIC,
            'formatRevision' => 0,
            'count' => $size,
            'offsetId' => MoFileLoader::MO_HEADER_SIZE,
            'offsetTranslated' => MoFileLoader::MO_HEADER_SIZE + (8 * $size),
            'sizeHashes' => 0,
            'offsetHashes' => MoFileLoader::MO_HEADER_SIZE + (16 * $size),
        ];

        $sourcesSize = \strlen($sources);
        $sourcesStart = $header['offsetHashes'] + 1;

        foreach ($offsets as $offset) {
            $sourceOffsets .= $this->writeLong($offset[1])
                          .$this->writeLong($offset[0] + $sourcesStart);
            $targetOffsets .= $this->writeLong($offset[3])
                          .$this->writeLong($offset[2] + $sourcesStart + $sourcesSize);
        }

<<<<<<< HEAD
        $output = implode('', array_map([$this, 'writeLong'], $header))
=======
        $output = implode('', array_map($this->writeLong(...), $header))
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
               .$sourceOffsets
               .$targetOffsets
               .$sources
               .$targets
        ;

        return $output;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function getExtension()
=======
    protected function getExtension(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return 'mo';
    }

<<<<<<< HEAD
    private function writeLong($str): string
=======
    private function writeLong(mixed $str): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return pack('V*', $str);
    }
}
