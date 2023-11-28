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
    <form id="contactForm" method="POST" action="<?php echo e(url('updateContact', ['id' => $contact->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

    <div style="display: flex; align-items: center;">
    <h1 style="flex: 1; text-align: center; color: red; margin-left: 160px;">Edito <?php echo e($contact->firstname); ?> <?php echo e($contact->lastname); ?></h1>
        <label style="margin-left: 10px;">
    Publish my Contact
    <input class="form-check-input" type="checkbox" name="publish" value="1" <?php echo e($contact->publish == 1 ? 'checked' : ''); ?>>
    </label>

    </div>

<table style="width:100%">
  <tr>
    <th>Contact</th>
    <th>Phones</th>
    <th>Emails</th>
  </tr>
  <tr>
    <td>
      <label for="firstname">Firstname:</label>
      <input type="text" id="firstname" name="firstname" value="<?php echo e($contact->firstname); ?>" /><br>
      <label for="lastname">Lastname:</label>
      <input type="text" id="lastname" name="lastname" value="<?php echo e($contact->lastname); ?>"><br>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" value="<?php echo e($contact->address); ?>"><br>
      <label for="zip">Zip:</label>
      <input type="text" id="zip" name="zip"value="<?php echo e($contact->zip); ?>"><br>
      <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="UnitedKingdom" <?php echo e($contact->country === 'UnitedKingdom' ? 'selected' : ''); ?>>UnitedKingdom</option>
            <option value="Albania" <?php echo e($contact->country === 'Albania' ? 'selected' : ''); ?>>Albania</option>
            <option value="Kosova" <?php echo e($contact->country === 'Kosova' ? 'selected' : ''); ?>>Kosova</option>
            <option value="UnitedStates" <?php echo e($contact->country === 'UnitedStates' ? 'selected' : ''); ?>>UnitedStates</option>
        </select>
    </td>
    <td>
        <div id="phoneInputs">
            <?php
            $phones = explode(',', $contact->phones);
            ?>

            <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <input type="text" name="phones[]" value="<?php echo e($phone); ?>">
                <input class="form-check-input" type="checkbox" name="phoneOptions[]" value="1" checked>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="#" id="addPhone">Add</a>
    </td>

    <td>
        <div id="emailInputs">
            <?php
            $emails = explode(',', $contact->emails);
            ?>

            <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <input type="text" name="emails[]" value="<?php echo e($email); ?>">
                <input class="form-check-input" type="checkbox" name="emailOptions[]" value="1" checked>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="#" id="addEmail">Add</a>
    </td>

  </tr>
</table>
<div style="display: flex; align-items: center;">
    <h3 style="flex: 1; text-align: center; color: red; margin-left: 100px;"></h3>
    <label style="margin-left: 10px;">
        <button type="submit" class="form-check-input">Edit Contact</button>
    </label>
</div>
</form>
<?php if(session('success')): ?>
<div id="successMessage" class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>



<script>
    const addPhoneButton = document.getElementById('addPhone');
    const phoneInputsContainer = document.getElementById('phoneInputs');

    addPhoneButton.addEventListener('click', function (event) {
        event.preventDefault();
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'phones[]';

        // Krijimi i checkbox-it per publikimin e  numrit te ri 
        const newCheckbox = document.createElement('input');
        newCheckbox.type = 'checkbox';
        newCheckbox.name = 'phoneOptions[]';
        newCheckbox.value = '1';
        newCheckbox.checked = true;

        // Vendosim numrin e telefonit dhe checkbox-in brenda nje div
        const inputDiv = document.createElement('div');
        inputDiv.appendChild(newInput);
        inputDiv.appendChild(newCheckbox);
        phoneInputsContainer.appendChild(inputDiv);
    });
    document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function (event) {
        const phoneInputs = document.querySelectorAll('input[name="phones[]"]');
        const phoneOptions = document.querySelectorAll('input[name="phoneOptions[]"]');
        
        for (let i = 0; i < phoneInputs.length; i++) {
            const phoneNumber = phoneInputs[i].value.trim();
            const publishPhone = phoneOptions[i].checked;
            
            if (phoneNumber === '' || !publishPhone) {
                // Fshij numrin dhe checkbox-in per kete numer qe nuk do te insertohet
                phoneInputs[i].remove();
                phoneOptions[i].remove();
            }
          }
      });
    });

    const addEmailButton = document.getElementById('addEmail');
    const emailInputsContainer = document.getElementById('emailInputs');

    addEmailButton.addEventListener('click', function (event) {
        event.preventDefault();
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'emails[]';
        newInput.className = 'emailInput';

        // Krijimi i checkbox-it per publikimin e ketij email-i te ri
        const newCheckbox = document.createElement('input');
        newCheckbox.type = 'checkbox';
        newCheckbox.name = 'emailOptions[]';
        newCheckbox.value = '1';
        newCheckbox.checked = true;

        // Vendosim email-in dhe checkbox-in brenda një div-i
        const inputDiv = document.createElement('div');
        inputDiv.appendChild(newInput);
        inputDiv.appendChild(newCheckbox);
        emailInputsContainer.appendChild(inputDiv);
    });
    document.addEventListener('DOMContentLoaded', function () {
      const contactForm = document.getElementById('contactForm');
      
      contactForm.addEventListener('submit', function (event) {
          const emailInputs = document.querySelectorAll('input[name="emails[]"]');
          const emailOptions = document.querySelectorAll('input[name="emailOptions[]"]');
          
          for (let i = 0; i < emailInputs.length; i++) {
              const emailAddress = emailInputs[i].value.trim();
              const publishEmail = emailOptions[i].checked;
              
              if (emailAddress === '' || !publishEmail) {
                  // Fshij adresen e email dhe checkbox per kete email qe nuk do te insertohet
                  emailInputs[i].remove();
                  emailOptions[i].remove();
              }
          }
      });
    });



    document.addEventListener('DOMContentLoaded', function () {
    const publishCheckbox = document.getElementById('check1');
    const publishInput = document.createElement('input');
    publishInput.type = 'hidden';
    publishInput.name = 'publish';
    publishInput.value = publishCheckbox.checked ? '1' : '0'; // Ndryshoni value nga 1 ne 0 kur checkbox nuk eshte i zgjedhur

    publishCheckbox.addEventListener('change', function() {
        publishInput.value = publishCheckbox.checked ? '1' : '0';
    });

    const contactForm = document.getElementById('contactForm');
    contactForm.appendChild(publishInput);
});
document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 1000); 
        }
    });

</script><?php /**PATH C:\xampp\htdocs\authentication\resources\views/editoContacts.blade.php ENDPATH**/ ?>