<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(!Auth::guard('web')->user()): ?>
    <?php
        return redirect()->route('login'); 
    ?>
<?php endif; ?>

<style>
.alert-success {
    background-color: #d4edda;
    color: #155724;
}
</style>
<div class="mainPage" style="text-align: center;">
    <fieldset>
<form method="POST" action="<?php echo e(url('updateContact', ['id' => $contact->id])); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <!-- Field for editing -->
    <input type="text" name="emri" value="<?php echo e($contact->firstname); ?>">
    <input type="text" name="emri" value="<?php echo e($contact->lastname); ?>">
    <input type="text" name="emri" value="<?php echo e($contact->address); ?>">
    <input type="text" name="emri" value="<?php echo e($contact->zip); ?>">
    <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="UnitedKingdom" <?php echo e($contact->country === 'UnitedKingdom' ? 'selected' : ''); ?>>UnitedKingdom</option>
            <option value="Albania" <?php echo e($contact->country === 'Albania' ? 'selected' : ''); ?>>Albania</option>
            <option value="Kosova" <?php echo e($contact->country === 'Kosova' ? 'selected' : ''); ?>>Kosova</option>
            <option value="UnitedStates" <?php echo e($contact->country === 'UnitedStates' ? 'selected' : ''); ?>>UnitedStates</option>
        </select>
        <input type="text" name="phones[]" value="<?php echo e($contact->phones); ?>">
        <input type="text" name="emails[]" value="<?php echo e($contact->emails); ?>">

    
        <!-- Add more fields as needed -->
    <button type="submit">Update</button>
    </form>
<?php if(session('success')): ?>
<div id="successMessage" class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\authentication\resources\views/edit.blade.php ENDPATH**/ ?>