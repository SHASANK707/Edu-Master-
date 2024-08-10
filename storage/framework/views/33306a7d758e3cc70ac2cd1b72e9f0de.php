<?php $__env->startSection('title', 'Add Staff'); ?>

<?php $__env->startSection('page_title', 'Add Staff'); ?>

<?php $__env->startSection('content'); ?>
    <div class="form-container">
        <form id="staffForm" action="<?php echo e(route('form.insert')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger" >
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            

            <div class="form-group">
                <label for="staff_name">Staff Name:</label>
                <input type="text" id="staff_name" name="staff_name">
                <?php $__errorArgs = ['staff_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="M" <?php echo e(old('gender') == 'M' ? 'selected' : ''); ?>>Male</option>
                    <option value="F" <?php echo e(old('gender') == 'F' ? 'selected' : ''); ?>>Female</option>
                    <option value="O" <?php echo e(old('gender') == 'O' ? 'selected' : ''); ?>>Other</option>
                </select>
                <span class="text-danger"><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" maxlength="10">
                <span id="phone_feedback" style="color: red;"></span>
                <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea>
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation">
                <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department">
                <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <button type="submit" name="save" value="1">Submit</button>
            </div>
        </form>
    </div>
    <div class="form-group" style="text-align: center;">
        <a href="/staff/form/view" class="button-link" id="viewDataLink">View Data</a>
    </div>

    <script>
        // Confirm before form submission
        document.getElementById('staffForm').addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to submit the form?')) {
                e.preventDefault();
            }
        });

        // Confirm before navigating to view data
        document.getElementById('viewDataLink').addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to view the data?')) {
                e.preventDefault();
            }
        });

        document.getElementById('contact_number').addEventListener('input', function() {
            var phoneInput = document.getElementById('contact_number');
            var phoneFeedback = document.getElementById('phone_feedback');
            var phone = phoneInput.value;
            // Allow only digits
            if (/^\d*$/.test(phone)) {
                phoneFeedback.textContent = '';
            } else {
                phoneFeedback.textContent = 'Please enter only digits.';
                phoneInput.value = phone.replace(/\D/g, ''); // Remove non-numeric characters
            }
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     var successMessage = document.getElementById('success-message');
        //     if (successMessage) {
        //         setTimeout(function() {
        //             successMessage.style.display = 'none';
        //         }, 2000); 
        //     }
        // });
        
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .form-container {
            background-color: #e9f7f9;
            border: 1px solid #cce5e5;
            padding: 20px;
        }

        .form-group label {
            color: #0056b3;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            border-color: #b3d9d9;
        }

        .form-group button[type="submit"] {
            background-color: #17a2b8;
        }

        .form-group button[type="submit"]:hover {
            background-color: #138496;
        }

        .error {
            color: red;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\staffform.blade.php ENDPATH**/ ?>