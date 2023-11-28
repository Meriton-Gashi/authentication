@include('nav')
@if(!Auth::guard('web')->user())
    <?php
        return redirect()->route('login'); 
    ?>
@endif


<!-- <h3>Dashboard - User</h3> -->
<!-- <h3 style="text-align: center; color: red;" >My Contact</h3> -->
<style>
.alert-success {
    background-color: #d4edda;
    color: #155724;
}
.alert-danger {
        background-color: red;
        border-color: #red;
        color: #721c24;
    }

</style>
<div class="mainPage" style="text-align: center;">
    <fieldset>


<form id="contactForm" method="POST" action="{{ route('insert') }}">
    @csrf
    <div style="display: flex; align-items: center;">
        <h1 style="flex: 1; text-align: center; color: red; margin-left: 160px;">Add Contact</h1>
        <label style="margin-left: 10px;">
            Publish my Contact
            <input class="form-check-input" type="checkbox" name="publish" value="something" checked>
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
      <input type="text" id="firstname" name="firstname" required><br>
      <label for="lastname">Lastname:</label>
      <input type="text" id="lastname" name="lastname" required><br>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required><br>
      <label for="zip">Zip/City:</label>
      <input type="text" id="zip" name="zip" required><br>
      <label for="country">Country:</label>
      <select name="country" id="country">
        <option value="UnitedKingdom">UK</option>
        <option value="Albania">AL</option>
        <option value="Kosova">XK</option>
        <option value="UnitedStates">USA</option>
      </select>
    </td>
    <td>
      <div id="phoneInputs">
        <input type="text" name="phones[]">
        <input class="form-check-input" type="checkbox" name="phoneOption1" value="something" checked >
      </div>
      <a href="#" id="addPhone">Add</a>
    </td>
    <td>
    <div id="emailInputs"> 
      <input type="text" id="email1" name="emails[]">
      <input class="form-check-input" type="checkbox" id="emailCheck1" name="emailOption1" value="something" checked>
    </div>
      <a href="#" id="addEmail">Add</a>
    </td>
  </tr>
</table>

<div style="display: flex; align-items: center;">
    <h3 style="flex: 1; text-align: center; color: red; margin-left: 100px;"></h3>
    <label style="margin-left: 10px;">
        <button class="form-check-input" type="submit">Add Contact</button>
    </label>
</div>
</form>
@if(session('success'))
<div id="successMessage" class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('alert'))
    <div class="alert alert-danger" id="alertMessage">
        {{ session('alert') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById("alertMessage").style.display = "none";
        }, 3000); 
    </script>
@endif
<!-- Pjesa e kodit HTML e lënë pa ndryshuar -->
<script>
    const addPhoneButton = document.getElementById('addPhone');
    const phoneInputsContainer = document.getElementById('phoneInputs');

    addPhoneButton.addEventListener('click', function (event) {
        event.preventDefault();
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'phones[]';

        // Krijimi i checkbox-it për publikimin e këtij numri të ri të telefonit
        const newCheckbox = document.createElement('input');
        newCheckbox.type = 'checkbox';
        newCheckbox.name = 'phoneOptions[]';
        newCheckbox.value = '1';
        newCheckbox.checked = true;

        // Vendosim numrin e telefonit dhe checkbox-in brenda një div-i
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
                // Fshij numrin e telefonit dhe checkbox-in për këtë numër që nuk do të insertohet
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

        // Krijimi i checkbox-it për publikimin e këtij email-i të ri
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
                  // Fshij adresën e email-it dhe checkbox-in për këtë email që nuk do të insertohet
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
    publishInput.value = publishCheckbox.checked ? '1' : '0'; // Ndryshoni value nga 1 në 0 kur checkbox nuk është i zgjedhur

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

</script>