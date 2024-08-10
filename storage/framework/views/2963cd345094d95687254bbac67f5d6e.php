<?php $__env->startSection('title', 'Student Info Add'); ?>

<?php $__env->startSection('page_title', 'Student Info'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Specific CSS for Student Form */
    .form-row {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
        font-size: 16px;
    }
    .btn-primary {
        background-color: #5cb85c;
        border-color: #4cae4c;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #4cae4c;
        border-color: #398439;
    }
    .btn-primary:focus {
        outline: none;
    }
</style>

<a class="button btn btn-info" href="<?php echo e(URL::to('student/view')); ?>">Show Data</a>

<form action="<?php echo e(URL::to('student/store')); ?>" method="post" onsubmit="return confirmSubmit()">
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

<?php if(session('success')): ?>
    <div class="alert alert-success" id="success-message">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

    <div class="form-row">
        
        <div class="form-group col-md-6">
            <label for="class_id">Class Name</label>
            <select name="class_id" class="form-control" value="<?php echo e(old('class_id')); ?>" required>
    <option value="">Select Class</option>
    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_id => $class_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($class_id); ?>"><?php echo e($class_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
            <span class="text-danger"><?php $__errorArgs = ['class_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" class="form-control" placeholder="Enter Student Name" value="<?php echo e(old('student_name')); ?>" required>
            <span class="text-danger"><?php $__errorArgs = ['student_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>
        <div class="form-group col-md-6">
            <label for="dob">DOB</label>
            <input type="date" name="dob" id="dob" class="form-control" value="<?php echo e(old('dob')); ?>"  required>
            <span id="dob_feedback" style="color: red;"></span>
            <span class="text-danger"><?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" value="<?php echo e(old('gender')); ?>" required>
                <option value="">Select Gender</option>
                <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>Male</option>
                <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Female</option>
                <option value="other" <?php echo e(old('gender') == 'other' ? 'selected' : ''); ?>>Other</option>
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
        <div class="form-group col-md-6">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo e(old('address')); ?>"required>
            <span class="text-danger"><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="parent_guardian_contact_info">Parent/Guardian Contact Info</label>
            <input type="tel" name="parent_guardian_contact_info" id="parent_guardian_contact_info" class="form-control" placeholder="Enter Contact Info" maxlength="10" value="<?php echo e(old('parent_guardian_contact_info')); ?>" required>
            <span id="phone_feedback" style="color: red;"></span>
            <span class="text-danger"><?php $__errorArgs = ['parent_guardian_contact_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>
        <div class="form-group col-md-6">
            <label for="other_contact">Other Contact</label>
            <input type="tel" name="other_contact" id="other_contact" class="form-control" placeholder="Enter Other Contact" maxlength="10" value="<?php echo e(old('other_contact')); ?>" required >
            <span id="phone_feedback" style="color: red;"></span>
            <span class="text-danger"><?php $__errorArgs = ['other_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="email_address">Email</label>
        <input type="email" name="email_address" class="form-control" placeholder="Enter Email" value="<?php echo e(old('email_address')); ?>" required>
        <span class="text-danger"><?php $__errorArgs = ['email_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo e(old('password')); ?>" required>
        <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
    </div>

    <button type="submit" class="btn-primary" name="save">Submit</button>
</form>

<script>
    function confirmSubmit() {
        return confirm('Are you sure you want to submit this form?');
    }
    document.getElementById('dob').addEventListener('input', function() {
            var dobInput = document.getElementById('dob');
            var dobFeedback = document.getElementById('dob_feedback');
            var dob = new Date(dobInput.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 6) {
                dobFeedback.textContent = 'You must be at least 6 years old.';
            } else {
                dobFeedback.textContent = '';
            }
        });
        document.getElementById('parent_guardian_contact_info').addEventListener('input', function() {
            var phoneInput = document.getElementById('parent_guardian_contact_info');
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
        document.getElementById('other_contact').addEventListener('input', function() {
            var phoneInput = document.getElementById('other_contact');
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

        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 2000); 
            }
        });
       
       
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\student.blade.php ENDPATH**/ ?>