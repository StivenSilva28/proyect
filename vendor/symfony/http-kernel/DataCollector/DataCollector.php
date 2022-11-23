<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\VarDumper\Caster\CutStub;
use Symfony\Component\VarDumper\Caster\ReflectionCaster;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Cloner\Stub;
use Symfony\Component\VarDumper\Cloner\VarCloner;

/**
 * DataCollector.
 *
 * Children of this class must store the collected data in the data property.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bernhard Schussek <bschussek@symfony.com>
 */
abstract class DataCollector implements DataCollectorInterface
{
    /**
     * @var array|Data
     */
    protected $data = [];

<<<<<<< HEAD
    /**
     * @var ClonerInterface
     */
    private $cloner;
=======
    private ClonerInterface $cloner;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Converts the variable into a serializable Data instance.
     *
     * This array can be displayed in the template using
     * the VarDumper component.
<<<<<<< HEAD
     *
     * @param mixed $var
     *
     * @return Data
     */
    protected function cloneVar($var)
=======
     */
    protected function cloneVar(mixed $var): Data
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($var instanceof Data) {
            return $var;
        }
<<<<<<< HEAD
        if (null === $this->cloner) {
=======
        if (!isset($this->cloner)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $this->cloner = new VarCloner();
            $this->cloner->setMaxItems(-1);
            $this->cloner->addCasters($this->getCasters());
        }

        return $this->cloner->cloneVar($var);
    }

    /**
     * @return callable[] The casters to add to the cloner
     */
    protected function getCasters()
    {
        $casters = [
            '*' => function ($v, array $a, Stub $s, $isNested) {
                if (!$v instanceof Stub) {
                    foreach ($a as $k => $v) {
                        if (\is_object($v) && !$v instanceof \DateTimeInterface && !$v instanceof Stub) {
                            $a[$k] = new CutStub($v);
                        }
                    }
                }

                return $a;
            },
        ] + ReflectionCaster::UNSET_CLOSURE_FILE_INFO;

        return $casters;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function __sleep()
=======
    public function __sleep(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return ['data'];
    }

    public function __wakeup()
    {
    }

    /**
     * @internal to prevent implementing \Serializable
     */
    final protected function serialize()
    {
    }

    /**
     * @internal to prevent implementing \Serializable
     */
<<<<<<< HEAD
    final protected function unserialize($data)
=======
    final protected function unserialize(string $data)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
    }
}
