<a href="<?php echo e(route('home')); ?>">Home</a> - 

<?php if(Auth::guard('web')->user()): ?>
<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a> -
<a href="<?php echo e(route('logout')); ?>">Logout</a>
<?php endif; ?>

<?php if(!Auth::guard('web')->user()): ?>
<a href="<?php echo e(route('login')); ?>">Login</a> - 
<a href="<?php echo e(route('registration')); ?>">Registration</a>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\authentication\resources\views/nav.blade.php ENDPATH**/ ?>