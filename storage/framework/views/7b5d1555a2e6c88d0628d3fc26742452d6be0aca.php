<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mainPage" style="text-align: center;">
    <fieldset>
        <h3 style="text-align: center; color: red;" >Login</h3>
            <form action="<?php echo e(route('login_submit')); ?>" method="post">
                <?php echo csrf_field(); ?>    
                <label for="fname">Username:</label>
                <input type="text"  name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password"  name="password"><br><br>
                <input type="submit" style="margin-left: 190px;" value="Login">
                <div style="margin-top:10px;">
                 <br>
                <a href="<?php echo e(route('forget_password')); ?>">Forget Password</a><br><br>
                <a href="<?php echo e(route('registration')); ?>">Registration</a>
            </form> 
            
   <?php /**PATH C:\xampp\htdocs\auth\resources\views/login.blade.php ENDPATH**/ ?>