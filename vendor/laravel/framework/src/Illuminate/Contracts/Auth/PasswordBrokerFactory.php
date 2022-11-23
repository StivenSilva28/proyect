<?php

namespace Illuminate\Contracts\Auth;

interface PasswordBrokerFactory
{
    /**
     * Get a password broker instance by name.
     *
     * @param  string|null  $name
<<<<<<< HEAD
     * @return mixed
=======
     * @return \Illuminate\Contracts\Auth\PasswordBroker
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function broker($name = null);
}
