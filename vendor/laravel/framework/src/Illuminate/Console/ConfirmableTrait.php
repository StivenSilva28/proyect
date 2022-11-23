<?php

namespace Illuminate\Console;

trait ConfirmableTrait
{
    /**
     * Confirm before proceeding with the action.
     *
     * This method only asks for confirmation in production.
     *
     * @param  string  $warning
     * @param  \Closure|bool|null  $callback
     * @return bool
     */
<<<<<<< HEAD
    public function confirmToProceed($warning = 'Application In Production!', $callback = null)
=======
    public function confirmToProceed($warning = 'Application In Production', $callback = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $callback = is_null($callback) ? $this->getDefaultConfirmCallback() : $callback;

        $shouldConfirm = value($callback);

        if ($shouldConfirm) {
            if ($this->hasOption('force') && $this->option('force')) {
                return true;
            }

<<<<<<< HEAD
            $this->alert($warning);

            $confirmed = $this->confirm('Do you really wish to run this command?');

            if (! $confirmed) {
                $this->comment('Command Canceled!');
=======
            $this->components->alert($warning);

            $confirmed = $this->components->confirm('Do you really wish to run this command?');

            if (! $confirmed) {
                $this->newLine();

                $this->components->warn('Command canceled.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

                return false;
            }
        }

        return true;
    }

    /**
     * Get the default confirmation callback.
     *
     * @return \Closure
     */
    protected function getDefaultConfirmCallback()
    {
        return function () {
            return $this->getLaravel()->environment() === 'production';
        };
    }
}
