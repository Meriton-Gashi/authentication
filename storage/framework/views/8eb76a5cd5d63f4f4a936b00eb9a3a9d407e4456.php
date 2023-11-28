<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mainPage">
    <fieldset>
        <h1 style="text-align: center; color: red;">Public Phone Book</h1>
        <ol class="olClass">
        <?php
                $contacts = \App\Models\Contact::orderBy('id', 'desc')->get();
            ?>
            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($contact->publish == 1): ?>
                    <li>
                        <?php echo e($contact->firstname); ?> <?php echo e($contact->lastname); ?>

                        <a href="#" class="toggle-details">View Details</a>
                        <div class="contact-details hidden">
                            <table>
                                <tr>
                                    <th>Address</th>
                                    <th>Phone Numbers</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <td><?php echo e($contact->zip); ?>, <?php echo e($contact->address); ?></td>
                                    <td><?php echo e($contact->phones); ?></td>
                                    <td><?php echo e($contact->emails); ?></td>
                                    <td><a href="<?php echo e(url('editoContacts', ['id' => $contact->id])); ?>" class="edit-link">Edit</a></td>
                                    <td><a href="#" class="delete-link" data-contact-id="<?php echo e($contact->id); ?>">Delete</a></td>
                                    <div id="success-message" style="display: none;"></div>

                                </tr>
                            </table>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </fieldset>
</div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleDetailLinks = document.querySelectorAll(".toggle-details");

        toggleDetailLinks.forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const detailsContainer = this.parentNode.querySelector(".contact-details");
                detailsContainer.classList.toggle("hidden");

                if (detailsContainer.classList.contains("hidden")) {
                    this.textContent = "View Details";
                } else {
                    this.textContent = "Hide Details";
                }
            });
        });
    });
    document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('delete-link')) {
        e.preventDefault();
        var contactId = e.target.getAttribute('data-contact-id');
        if (confirm('Are you sure to delete this contact?')) {
            // Përdor JavaScript për të dërguar kërkesën DELETE
            fetch("<?php echo e(url('deleteContactID')); ?>/" + contactId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                },
            }).then(response => {
                if (response.ok) {
                    // Rifresko faqen pasi përdoruesi klikon "Po"
                    var userConfirmed = confirm('Kontakti është fshirë me sukses. Dëshironi të rifreskoni faqen?');
                    if (userConfirmed) {
                        location.reload();
                    }
                } else {
    
                }
            });
        }
    }
});
</script>

<?php /**PATH C:\xampp\htdocs\auth\resources\views/phonebook.blade.php ENDPATH**/ ?>