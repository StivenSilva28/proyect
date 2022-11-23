<?php

namespace Illuminate\Validation;

use Illuminate\Support\Fluent;

class ConditionalRules
{
    /**
     * The boolean condition indicating if the rules should be added to the attribute.
     *
     * @var callable|bool
     */
    protected $condition;

    /**
     * The rules to be added to the attribute.
     *
<<<<<<< HEAD
     * @var array|string
=======
     * @var array|string|\Closure
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $rules;

    /**
     * The rules to be added to the attribute if the condition fails.
     *
<<<<<<< HEAD
     * @var array|string
=======
     * @var array|string|\Closure
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $defaultRules;

    /**
     * Create a new conditional rules instance.
     *
     * @param  callable|bool  $condition
<<<<<<< HEAD
     * @param  array|string  $rules
     * @param  array|string  $defaultRules
=======
     * @param  array|string|\Closure  $rules
     * @param  array|string|\Closure  $defaultRules
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return void
     */
    public function __construct($condition, $rules, $defaultRules = [])
    {
        $this->condition = $condition;
        $this->rules = $rules;
        $this->defaultRules = $defaultRules;
    }

    /**
     * Determine if the conditional rules should be added.
     *
     * @param  array  $data
     * @return bool
     */
    public function passes(array $data = [])
    {
        return is_callable($this->condition)
                    ? call_user_func($this->condition, new Fluent($data))
                    : $this->condition;
    }

    /**
     * Get the rules.
     *
<<<<<<< HEAD
     * @return array
     */
    public function rules()
    {
        return is_string($this->rules) ? explode('|', $this->rules) : $this->rules;
=======
     * @param  array  $data
     * @return array
     */
    public function rules(array $data = [])
    {
        return is_string($this->rules)
                    ? explode('|', $this->rules)
                    : value($this->rules, new Fluent($data));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get the default rules.
     *
<<<<<<< HEAD
     * @return array
     */
    public function defaultRules()
    {
        return is_string($this->defaultRules) ? explode('|', $this->defaultRules) : $this->defaultRules;
=======
     * @param  array  $data
     * @return array
     */
    public function defaultRules(array $data = [])
    {
        return is_string($this->defaultRules)
                    ? explode('|', $this->defaultRules)
                    : value($this->defaultRules, new Fluent($data));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
