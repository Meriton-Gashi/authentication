<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h3>Dashboard - Admin</h3>
<p>Hi <?php echo e(Auth::guard('web')->user()->name); ?>, Welcome to dashboard!</p><?php /**PATH D:\xampp\htdocs\authentication\resources\views/dashboard_admin.blade.php ENDPATH**/ ?>