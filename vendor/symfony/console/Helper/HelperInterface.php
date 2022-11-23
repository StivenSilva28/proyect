<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

/**
 * HelperInterface is the interface all helpers must implement.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface HelperInterface
{
    /**
     * Sets the helper set associated with this helper.
     */
    public function setHelperSet(HelperSet $helperSet = null);

    /**
     * Gets the helper set associated with this helper.
<<<<<<< HEAD
     *
     * @return HelperSet|null
     */
    public function getHelperSet();
=======
     */
    public function getHelperSet(): ?HelperSet;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns the canonical name of this helper.
     *
     * @return string
     */
    public function getName();
}
