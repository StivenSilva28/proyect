<?php

namespace Illuminate\Support;

use Carbon\Carbon as BaseCarbon;
use Carbon\CarbonImmutable as BaseCarbonImmutable;
<<<<<<< HEAD

class Carbon extends BaseCarbon
{
=======
use Illuminate\Support\Traits\Conditionable;

class Carbon extends BaseCarbon
{
    use Conditionable;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseCarbon::setTestNow($testNow);
        BaseCarbonImmutable::setTestNow($testNow);
    }
}
