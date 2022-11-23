<?php

namespace Illuminate\View\Compilers\Concerns;

<<<<<<< HEAD
=======
use Illuminate\Support\Str;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
trait CompilesStacks
{
    /**
     * Compile the stack statements into the content.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileStack($expression)
    {
        return "<?php echo \$__env->yieldPushContent{$expression}; ?>";
    }

    /**
     * Compile the push statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compilePush($expression)
    {
        return "<?php \$__env->startPush{$expression}; ?>";
    }

    /**
<<<<<<< HEAD
=======
     * Compile the push-once statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compilePushOnce($expression)
    {
        $parts = explode(',', $this->stripParentheses($expression), 2);

        [$stack, $id] = [$parts[0], $parts[1] ?? ''];

        $id = trim($id) ?: "'".(string) Str::uuid()."'";

        return '<?php if (! $__env->hasRenderedOnce('.$id.')): $__env->markAsRenderedOnce('.$id.');
$__env->startPush('.$stack.'); ?>';
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Compile the end-push statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndpush()
    {
        return '<?php $__env->stopPush(); ?>';
    }

    /**
<<<<<<< HEAD
=======
     * Compile the end-push-once statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndpushOnce()
    {
        return '<?php $__env->stopPush(); endif; ?>';
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Compile the prepend statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compilePrepend($expression)
    {
        return "<?php \$__env->startPrepend{$expression}; ?>";
    }

    /**
<<<<<<< HEAD
=======
     * Compile the prepend-once statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compilePrependOnce($expression)
    {
        $parts = explode(',', $this->stripParentheses($expression), 2);

        [$stack, $id] = [$parts[0], $parts[1] ?? ''];

        $id = trim($id) ?: "'".(string) Str::uuid()."'";

        return '<?php if (! $__env->hasRenderedOnce('.$id.')): $__env->markAsRenderedOnce('.$id.');
$__env->startPrepend('.$stack.'); ?>';
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Compile the end-prepend statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndprepend()
    {
        return '<?php $__env->stopPrepend(); ?>';
    }
<<<<<<< HEAD
=======

    /**
     * Compile the end-prepend-once statements into valid PHP.
     *
     * @return string
     */
    protected function compileEndprependOnce()
    {
        return '<?php $__env->stopPrepend(); endif; ?>';
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
