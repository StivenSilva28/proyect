<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Registers custom mime types guessers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class AddMimeTypeGuesserPass implements CompilerPassInterface
{
<<<<<<< HEAD
    private $mimeTypesService;
    private $mimeTypeGuesserTag;

    public function __construct(string $mimeTypesService = 'mime_types', string $mimeTypeGuesserTag = 'mime.mime_type_guesser')
    {
        if (0 < \func_num_args()) {
            trigger_deprecation('symfony/mime', '5.3', 'Configuring "%s" is deprecated.', __CLASS__);
        }

        $this->mimeTypesService = $mimeTypesService;
        $this->mimeTypeGuesserTag = $mimeTypeGuesserTag;
    }

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
<<<<<<< HEAD
        if ($container->has($this->mimeTypesService)) {
            $definition = $container->findDefinition($this->mimeTypesService);
            foreach ($container->findTaggedServiceIds($this->mimeTypeGuesserTag, true) as $id => $attributes) {
=======
        if ($container->has('mime_types')) {
            $definition = $container->findDefinition('mime_types');
            foreach ($container->findTaggedServiceIds('mime.mime_type_guesser', true) as $id => $attributes) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $definition->addMethodCall('registerGuesser', [new Reference($id)]);
            }
        }
    }
}
