<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h3>Login</h3>

<form action="<?php echo e(route('login_submit')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div>Email Address</div>
    <div>
        <input type="text" name="email">
    </div>

    <div>Password</div>
    <div>
        <input type="password" name="password">
    </div>

    <div style="margin-top:10px;">
        <input type="submit" value="Login">
        <br>
        <a href="<?php echo e(route('forget_password')); ?>">Forget Password</a>
    </div>
</form><?php /**PATH D:\xampp\htdocs\authentication\resources\views/login.blade.php ENDPATH**/ ?>