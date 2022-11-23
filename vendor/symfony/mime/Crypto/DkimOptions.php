<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Crypto;

/**
 * A helper providing autocompletion for available DkimSigner options.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class DkimOptions
{
<<<<<<< HEAD
    private $options = [];
=======
    private array $options = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function toArray(): array
    {
        return $this->options;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function algorithm(string $algo): self
=======
    public function algorithm(string $algo): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['algorithm'] = $algo;

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function signatureExpirationDelay(int $show): self
=======
    public function signatureExpirationDelay(int $show): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['signature_expiration_delay'] = $show;

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function bodyMaxLength(int $max): self
=======
    public function bodyMaxLength(int $max): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['body_max_length'] = $max;

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function bodyShowLength(bool $show): self
=======
    public function bodyShowLength(bool $show): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['body_show_length'] = $show;

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function headerCanon(string $canon): self
=======
    public function headerCanon(string $canon): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['header_canon'] = $canon;

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function bodyCanon(string $canon): self
=======
    public function bodyCanon(string $canon): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['body_canon'] = $canon;

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function headersToIgnore(array $headers): self
=======
    public function headersToIgnore(array $headers): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->options['headers_to_ignore'] = $headers;

        return $this;
    }
}
