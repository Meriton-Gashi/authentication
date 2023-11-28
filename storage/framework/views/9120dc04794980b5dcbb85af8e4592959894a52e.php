<!-- resources/views/editContact.blade.php -->

  <!-- Përfshijeni layout-in tuaj të zakonshëm -->

<?php $__env->startSection('content'); ?>
<div class="mainPage" style="text-align: center;">
    <h1>Edit Contact</h1>
    <form method="POST" action="<?php echo e(url('updateContact', ['id' => $contact->id])); ?>">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <!-- Shtojeni fushat e ndryshimit të të dhënave të kontaktit -->
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo e($contact->firstname); ?>" /><br>
        <!-- Shtojeni më shumë fusha këtu -->
        <button type="submit">Save Changes</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\authentication\resources\views/editoContact.blade.php ENDPATH**/ ?>