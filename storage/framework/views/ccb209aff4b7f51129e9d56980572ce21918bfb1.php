<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h3>Registration</h3>

<form action="<?php echo e(route('registration_submit')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div>Name</div>
    <div>
        <input type="text" name="name">
    </div>

    <div>Email Address</div>
    <div>
        <input type="text" name="email">
    </div>

    <div>Password</div>
    <div>
        <input type="password" name="password">
    </div>

    <div>Retype Password</div>
    <div>
        <input type="password" name="retype_password">
    </div>

    <div style="margin-top:10px;"><input type="submit" value="Make Registration"></div>
</form><?php /**PATH D:\xampp\htdocs\authentication\resources\views/registration.blade.php ENDPATH**/ ?>