<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h3>Forget Password</h3>

<form action="<?php echo e(route('forget_password_submit')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div>Email Address</div>
    <div>
        <input type="text" name="email">
    </div>

    <div style="margin-top:10px;">
        <input type="submit" value="Submit">
        <br>
        <a href="<?php echo e(route('login')); ?>">Back to Login Page</a>
    </div>
</form><?php /**PATH D:\xampp\htdocs\authentication\resources\views/forget_password.blade.php ENDPATH**/ ?>