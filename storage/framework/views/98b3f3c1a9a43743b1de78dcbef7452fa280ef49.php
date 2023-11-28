<form method="POST" action="<?php echo e(route('updateContact', ['id' => $contact->id])); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <!-- Fushat e redaktimit -->
    <input type="text" name="emri" value="<?php echo e($contact->emri); ?>">
    <input type="email" name="email" value="<?php echo e($contact->email); ?>">
    <!-- Shto më shumë fusha sipas nevojës -->
    <button type="submit">Përditëso</button>
</form>
<?php /**PATH C:\xampp\htdocs\authentication\resources\views/contacts/edit.blade.php ENDPATH**/ ?>