<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h3>Reset Password</h3>

<form action="<?php echo e(route('reset_password_submit')); ?>" method="post">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="token" value="<?php echo e($token); ?>">
    <input type="hidden" name="email" value="<?php echo e($email); ?>">

    <div>New Password</div>
    <div>
        <input type="password" name="new_password">
    </div>

    <div>Retype Password</div>
    <div>
        <input type="password" name="retype_password">
    </div>

    <div style="margin-top:10px;">
        <input type="submit" value="Update">
    </div>
</form><?php /**PATH D:\xampp\htdocs\authentication\resources\views/reset_password.blade.php ENDPATH**/ ?>