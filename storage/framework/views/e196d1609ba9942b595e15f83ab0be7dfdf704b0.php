<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
    <link href="<?php echo e(asset('style.css')); ?>" rel="stylesheet">
</head>
<body>
    <h2 class="h3titile" style="text-align: center;">Phone Book</h2>
    <div class="divButtons">
        <?php if(!Auth::guard('web')->user()): ?>
            <button class="buttonLogin"><a href="<?php echo e(route('login')); ?>">Login</a></button>
            <button class="buttonPhone"><a href="<?php echo e(route('phonebook')); ?>">Public Phone Book</a></button>
        <?php endif; ?>
        <?php if(Auth::guard('web')->user()): ?>
        <button class="buttonLogin"><a href="<?php echo e(route('logout')); ?>">Logout</a></button>
            <button class="buttonPhone"><a href="<?php echo e(route('phonebook')); ?>">Public Phone Book</a></button>
            <button class="buttonContact"><a href="<?php echo e(route('dashboard')); ?>">Add Contact</a></button>
            <button class="buttonContact"><a href="<?php echo e(route('editContact')); ?>">My Last Contact</a></button>
        <?php endif; ?>
    </div>

        
            <?php /**PATH C:\xampp\htdocs\auth\resources\views/nav.blade.php ENDPATH**/ ?>