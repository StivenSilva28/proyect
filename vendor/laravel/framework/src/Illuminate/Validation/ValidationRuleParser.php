<?php

namespace Illuminate\Validation;

use Closure;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Validation\InvokableRule;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Contracts\Validation\Rule as RuleContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Rules\Unique;

class ValidationRuleParser
{
    /**
     * The data being validated.
     *
     * @var array
     */
    public $data;

    /**
     * The implicit attributes.
     *
     * @var array
     */
    public $implicitAttributes = [];

    /**
     * Create a new validation rule parser.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Parse the human-friendly rules into a full rules array for the validator.
     *
     * @param  array  $rules
     * @return \stdClass
     */
    public function explode($rules)
    {
        $this->implicitAttributes = [];

        $rules = $this->explodeRules($rules);

        return (object) [
            'rules' => $rules,
            'implicitAttributes' => $this->implicitAttributes,
        ];
    }

    /**
     * Explode the rules into an array of explicit rules.
     *
     * @param  array  $rules
     * @return array
     */
    protected function explodeRules($rules)
    {
        foreach ($rules as $key => $rule) {
<<<<<<< HEAD
            if (Str::contains($key, '*')) {
=======
            if (str_contains($key, '*')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $rules = $this->explodeWildcardRules($rules, $key, [$rule]);

                unset($rules[$key]);
            } else {
<<<<<<< HEAD
                $rules[$key] = $this->explodeExplicitRule($rule);
=======
                $rules[$key] = $this->explodeExplicitRule($rule, $key);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }
        }

        return $rules;
    }

    /**
     * Explode the explicit rule into an array if necessary.
     *
     * @param  mixed  $rule
<<<<<<< HEAD
     * @return array
     */
    protected function explodeExplicitRule($rule)
    {
        if (is_string($rule)) {
            return explode('|', $rule);
        } elseif (is_object($rule)) {
            return [$this->prepareRule($rule)];
        }

        return array_map([$this, 'prepareRule'], $rule);
=======
     * @param  string  $attribute
     * @return array
     */
    protected function explodeExplicitRule($rule, $attribute)
    {
        if (is_string($rule)) {
            [$name] = static::parseStringRule($rule);

            return static::ruleIsRegex($name) ? [$rule] : explode('|', $rule);
        }

        if (is_object($rule)) {
            return Arr::wrap($this->prepareRule($rule, $attribute));
        }

        return array_map(
            [$this, 'prepareRule'],
            $rule,
            array_fill((int) array_key_first($rule), count($rule), $attribute)
        );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Prepare the given rule for the Validator.
     *
     * @param  mixed  $rule
<<<<<<< HEAD
     * @return mixed
     */
    protected function prepareRule($rule)
=======
     * @param  string  $attribute
     * @return mixed
     */
    protected function prepareRule($rule, $attribute)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($rule instanceof Closure) {
            $rule = new ClosureValidationRule($rule);
        }

<<<<<<< HEAD
=======
        if ($rule instanceof InvokableRule) {
            $rule = InvokableValidationRule::make($rule);
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        if (! is_object($rule) ||
            $rule instanceof RuleContract ||
            ($rule instanceof Exists && $rule->queryCallbacks()) ||
            ($rule instanceof Unique && $rule->queryCallbacks())) {
            return $rule;
        }

<<<<<<< HEAD
=======
        if ($rule instanceof NestedRules) {
            return $rule->compile(
                $attribute, $this->data[$attribute] ?? null, Arr::dot($this->data)
            )->rules[$attribute];
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        return (string) $rule;
    }

    /**
     * Define a set of rules that apply to each element in an array attribute.
     *
     * @param  array  $results
     * @param  string  $attribute
     * @param  string|array  $rules
     * @return array
     */
    protected function explodeWildcardRules($results, $attribute, $rules)
    {
        $pattern = str_replace('\*', '[^\.]*', preg_quote($attribute));

        $data = ValidationData::initializeAndGatherData($attribute, $this->data);

        foreach ($data as $key => $value) {
            if (Str::startsWith($key, $attribute) || (bool) preg_match('/^'.$pattern.'\z/', $key)) {
                foreach ((array) $rules as $rule) {
<<<<<<< HEAD
                    $this->implicitAttributes[$attribute][] = $key;

                    $results = $this->mergeRules($results, $key, $rule);
=======
                    if ($rule instanceof NestedRules) {
                        $compiled = $rule->compile($key, $value, $data);

                        $this->implicitAttributes = array_merge_recursive(
                            $compiled->implicitAttributes,
                            $this->implicitAttributes,
                            [$attribute => [$key]]
                        );

                        $results = $this->mergeRules($results, $compiled->rules);
                    } else {
                        $this->implicitAttributes[$attribute][] = $key;

                        $results = $this->mergeRules($results, $key, $rule);
                    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                }
            }
        }

        return $results;
    }

    /**
     * Merge additional rules into a given attribute(s).
     *
     * @param  array  $results
     * @param  string|array  $attribute
     * @param  string|array  $rules
     * @return array
     */
    public function mergeRules($results, $attribute, $rules = [])
    {
        if (is_array($attribute)) {
            foreach ((array) $attribute as $innerAttribute => $innerRules) {
                $results = $this->mergeRulesForAttribute($results, $innerAttribute, $innerRules);
            }

            return $results;
        }

        return $this->mergeRulesForAttribute(
            $results, $attribute, $rules
        );
    }

    /**
     * Merge additional rules into a given attribute.
     *
     * @param  array  $results
     * @param  string  $attribute
     * @param  string|array  $rules
     * @return array
     */
    protected function mergeRulesForAttribute($results, $attribute, $rules)
    {
        $merge = head($this->explodeRules([$rules]));

        $results[$attribute] = array_merge(
<<<<<<< HEAD
            isset($results[$attribute]) ? $this->explodeExplicitRule($results[$attribute]) : [], $merge
=======
            isset($results[$attribute]) ? $this->explodeExplicitRule($results[$attribute], $attribute) : [], $merge
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        );

        return $results;
    }

    /**
     * Extract the rule name and parameters from a rule.
     *
     * @param  array|string  $rule
     * @return array
     */
    public static function parse($rule)
    {
<<<<<<< HEAD
        if ($rule instanceof RuleContract) {
=======
        if ($rule instanceof RuleContract || $rule instanceof NestedRules) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return [$rule, []];
        }

        if (is_array($rule)) {
            $rule = static::parseArrayRule($rule);
        } else {
            $rule = static::parseStringRule($rule);
        }

        $rule[0] = static::normalizeRule($rule[0]);

        return $rule;
    }

    /**
     * Parse an array based rule.
     *
     * @param  array  $rule
     * @return array
     */
    protected static function parseArrayRule(array $rule)
    {
        return [Str::studly(trim(Arr::get($rule, 0, ''))), array_slice($rule, 1)];
    }

    /**
     * Parse a string based rule.
     *
     * @param  string  $rule
     * @return array
     */
    protected static function parseStringRule($rule)
    {
        $parameters = [];

        // The format for specifying validation rules and parameters follows an
        // easy {rule}:{parameters} formatting convention. For instance the
        // rule "Max:3" states that the value may only be three letters.
<<<<<<< HEAD
        if (strpos($rule, ':') !== false) {
=======
        if (str_contains($rule, ':')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            [$rule, $parameter] = explode(':', $rule, 2);

            $parameters = static::parseParameters($rule, $parameter);
        }

        return [Str::studly(trim($rule)), $parameters];
    }

    /**
     * Parse a parameter list.
     *
     * @param  string  $rule
     * @param  string  $parameter
     * @return array
     */
    protected static function parseParameters($rule, $parameter)
    {
<<<<<<< HEAD
        $rule = strtolower($rule);

        if (in_array($rule, ['regex', 'not_regex', 'notregex'], true)) {
            return [$parameter];
        }

        return str_getcsv($parameter);
=======
        return static::ruleIsRegex($rule) ? [$parameter] : str_getcsv($parameter);
    }

    /**
     * Determine if the rule is a regular expression.
     *
     * @param  string  $rule
     * @return bool
     */
    protected static function ruleIsRegex($rule)
    {
        return in_array(strtolower($rule), ['regex', 'not_regex', 'notregex'], true);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Normalizes a rule so that we can accept short types.
     *
     * @param  string  $rule
     * @return string
     */
    protected static function normalizeRule($rule)
    {
<<<<<<< HEAD
        switch ($rule) {
            case 'Int':
                return 'Integer';
            case 'Bool':
                return 'Boolean';
            default:
                return $rule;
        }
=======
        return match ($rule) {
            'Int' => 'Integer',
            'Bool' => 'Boolean',
            default => $rule,
        };
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Expand and conditional rules in the given array of rules.
     *
     * @param  array  $rules
     * @param  array  $data
     * @return array
     */
    public static function filterConditionalRules($rules, array $data = [])
    {
        return collect($rules)->mapWithKeys(function ($attributeRules, $attribute) use ($data) {
            if (! is_array($attributeRules) &&
                ! $attributeRules instanceof ConditionalRules) {
                return [$attribute => $attributeRules];
            }

            if ($attributeRules instanceof ConditionalRules) {
                return [$attribute => $attributeRules->passes($data)
<<<<<<< HEAD
                                ? array_filter($attributeRules->rules())
                                : array_filter($attributeRules->defaultRules()), ];
=======
                                ? array_filter($attributeRules->rules($data))
                                : array_filter($attributeRules->defaultRules($data)), ];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }

            return [$attribute => collect($attributeRules)->map(function ($rule) use ($data) {
                if (! $rule instanceof ConditionalRules) {
                    return [$rule];
                }

<<<<<<< HEAD
                return $rule->passes($data) ? $rule->rules() : $rule->defaultRules();
=======
                return $rule->passes($data) ? $rule->rules($data) : $rule->defaultRules($data);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            })->filter()->flatten(1)->values()->all()];
        })->all();
    }
}
