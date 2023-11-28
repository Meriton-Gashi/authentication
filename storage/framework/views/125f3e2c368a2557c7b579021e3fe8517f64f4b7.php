<?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h3>Dashboard - Admin</h3>
<p>Hi <?php echo e(Auth::guard('admin')->user()->name); ?>, Welcome to dashboard!</p><?php /**PATH C:\xampp\htdocs\authentication\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>