<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

<<<<<<< HEAD
=======
use Symfony\Component\Finder\SplFileInfo;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
/**
 * FilecontentFilterIterator filters files by their contents using patterns (regexps or strings).
 *
 * @author Fabien Potencier  <fabien@symfony.com>
 * @author Włodzimierz Gajda <gajdaw@gajdaw.pl>
 *
<<<<<<< HEAD
 * @extends MultiplePcreFilterIterator<string, \SplFileInfo>
=======
 * @extends MultiplePcreFilterIterator<string, SplFileInfo>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 */
class FilecontentFilterIterator extends MultiplePcreFilterIterator
{
    /**
     * Filters the iterator values.
<<<<<<< HEAD
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function accept()
=======
     */
    public function accept(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->matchRegexps && !$this->noMatchRegexps) {
            return true;
        }

        $fileinfo = $this->current();

        if ($fileinfo->isDir() || !$fileinfo->isReadable()) {
            return false;
        }

        $content = $fileinfo->getContents();
        if (!$content) {
            return false;
        }

        return $this->isAccepted($content);
    }

    /**
     * Converts string to regexp if necessary.
     *
     * @param string $str Pattern: string or regexp
<<<<<<< HEAD
     *
     * @return string
     */
    protected function toRegex(string $str)
=======
     */
    protected function toRegex(string $str): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->isRegex($str) ? $str : '/'.preg_quote($str, '/').'/';
    }
}
