<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Cloner;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface ClonerInterface
{
    /**
     * Clones a PHP variable.
<<<<<<< HEAD
     *
     * @param mixed $var Any PHP variable
     *
     * @return Data
     */
    public function cloneVar($var);
=======
     */
    public function cloneVar(mixed $var): Data;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
