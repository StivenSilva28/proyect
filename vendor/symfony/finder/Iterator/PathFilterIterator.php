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
 * PathFilterIterator filters files by path patterns (e.g. some/special/dir).
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
class PathFilterIterator extends MultiplePcreFilterIterator
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
        $filename = $this->current()->getRelativePathname();

        if ('\\' === \DIRECTORY_SEPARATOR) {
            $filename = str_replace('\\', '/', $filename);
        }

        return $this->isAccepted($filename);
    }

    /**
     * Converts strings to regexp.
     *
     * PCRE patterns are left unchanged.
     *
     * Default conversion:
     *     'lorem/ipsum/dolor' ==>  'lorem\/ipsum\/dolor/'
     *
     * Use only / as directory separator (on Windows also).
     *
     * @param string $str Pattern: regexp or dirname
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
