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

use Symfony\Component\Finder\Glob;

/**
 * FilenameFilterIterator filters files by patterns (a regexp, a glob, or a string).
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @extends MultiplePcreFilterIterator<string, \SplFileInfo>
 */
class FilenameFilterIterator extends MultiplePcreFilterIterator
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
        return $this->isAccepted($this->current()->getFilename());
    }

    /**
     * Converts glob to regexp.
     *
     * PCRE patterns are left unchanged.
     * Glob strings are transformed with Glob::toRegex().
     *
     * @param string $str Pattern: glob or regexp
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
        return $this->isRegex($str) ? $str : Glob::toRegex($str);
    }
}
