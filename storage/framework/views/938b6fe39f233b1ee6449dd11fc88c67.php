<?php $__env->startSection('title', 'Faculty Info Update'); ?>
<?php $__env->startSection('styles'); ?>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        table {
            border: 2px solid black;
            width: 100%;
        }

        th {
            background-color: #04AA6D;
            color: white;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: grey;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="form-title">Edit Faculty Details</h2>
        <form id="faculty-form" method="POST" action="<?php echo e(URL::to('/faculty/update')); ?>" onsubmit="return confirmUpdate()">
            <?php echo csrf_field(); ?>
            <!-- <div class="form-group">
                <label for="faculty_id">Faculty ID</label>
                <input type="text" class="form-control" id="faculty_id" name="faculty_id" value="<?php echo e($faculty->faculty_id); ?>" placeholder="Enter Faculty ID" required>
            </div> -->

            <div class="form-group">
                <label for="faculty_name">Faculty Name</label>
                <input type="text" class="form-control" id="faculty_name" name="faculty_name" value="<?php echo e($faculty->faculty_name); ?>" placeholder="Enter Faculty Name" required>
                <?php $__errorArgs = ['faculty_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- <div class="form-group">
                <label for="faculty_age">Faculty Age</label>
                <input type="number" class="form-control" id="faculty_age" name="faculty_age" value="<?php echo e($faculty->faculty_age); ?>" placeholder="Enter Faculty Age" required>
            </div> -->

            <div class="form-group">
                <label for="faculty_dob">Faculty Date of Birth</label>
                <input type="date" class="form-control" id="faculty_dob" name="faculty_dob" value="<?php echo e($faculty->faculty_dob); ?>" required>
                
                <span id="dob_feedback" style="color: red;"></span>
                <?php $__errorArgs = ['faculty_dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_gender">Faculty Gender</label>
                <select class="form-control" id="faculty_gender" name="faculty_gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" <?php echo e(old('faculty_gender',$faculty->faculty_gender) == 'Male' ? 'selected' : ''); ?>>Male</option>
                    <option value="Female" <?php echo e(old('faculty_gender',$faculty->faculty_gender) == 'Female' ? 'selected' : ''); ?>>Female</option>
                    <option value="Other" <?php echo e(old('faculty_gender',$faculty->faculty_gender) == 'Other' ? 'selected' : ''); ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="faculty_contact">Faculty Contact No</label>
                <input type="text" class="form-control" id="faculty_contact" name="faculty_contact" maxlength="10" value="<?php echo e($faculty->faculty_contact); ?>" placeholder="Enter Faculty Contact No" required>

                <span id="phone_feedback" style="color: red;"></span>
                <?php $__errorArgs = ['faculty_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_address">Faculty Address</label>
                <textarea class="form-control" id="faculty_address" name="faculty_address" rows="3" placeholder="Enter Address" required><?php echo e($faculty->faculty_address); ?></textarea>
                <?php $__errorArgs = ['faculty_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_email">Faculty Email Address</label>
                <input type="email" class="form-control" id="faculty_email" name="faculty_email" value="<?php echo e($faculty->faculty_email); ?>" placeholder="Enter Email Address" required>
                <span id="phone_feedback" style="color: red;"></span>
                <?php $__errorArgs = ['faculty_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error" style="color:red;"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_qualification">Faculty Qualification</label>
                <input type="text" class="form-control" id="faculty_qualification" name="faculty_qualification" value="<?php echo e($faculty->faculty_qualification); ?>" placeholder="Enter Faculty Qualification" required>
                <?php $__errorArgs = ['faculty_qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_doj">Faculty Date of Joining</label>
                <span id="dob_feedback" style="color: red;"></span>
                <input type="date" class="form-control" id="faculty_doj" name="faculty_doj" value="<?php echo e($faculty->faculty_doj); ?>" required>
                <?php $__errorArgs = ['faculty_doj'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_specializations">Faculty Specialization</label>
                <input type="text" class="form-control" id="faculty_specializations" name="faculty_specializations" value="<?php echo e($faculty->faculty_specializations); ?>" placeholder="Enter Faculty Specialization" required>
                <?php $__errorArgs = ['faculty_specialization'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_experience">Faculty Experience</label>
                <textarea class="form-control" id="faculty_experience" name="faculty_experience" rows="3" placeholder="Enter Experience" required><?php echo e($faculty->faculty_experience); ?></textarea>
                <?php $__errorArgs = ['faculty_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_designation">Faculty Designation</label>
                <input type="text" class="form-control" id="faculty_designation" name="faculty_designation" value="<?php echo e($faculty->faculty_designation); ?>" placeholder="Enter Faculty Designation" required>
                <?php $__errorArgs = ['faculty_designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="faculty_department">Faculty Department</label>
                <input type="text" class="form-control" id="faculty_department" name="faculty_department" value="<?php echo e($faculty->faculty_department); ?>" placeholder="Enter Faculty Department" required>
                <?php $__errorArgs = ['faculty_department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?> </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <input type="hidden" name="update_id" value="<?php echo e($faculty->faculty_id); ?>">

            <button type="submit" class="btn btn-primary" name="save">Update</button>
        </form>
    </div>

    <br><br>
    <hr>
    <hr>

    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this faculty member?');
        }
        
        document.getElementById('faculty_dob').addEventListener('input', function() {
            var dobInput = document.getElementById('faculty_dob');
            var dobFeedback = document.getElementById('dob_feedback');
            var dob = new Date(dobInput.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 18) {
                dobFeedback.textContent = 'You must be at least 18 years old.';
            } else {
                dobFeedback.textContent = '';
            }
        });
        function validateAge() {
            var ageInput = document.getElementById('faculty_age');
            var ageFeedback = document.getElementById('age_feedback');
            var age = parseInt(ageInput.value, 10);
            if (isNaN(age) || age < 18) {
                ageFeedback.textContent = 'Faculty must be at least 18 years old.';
                return false;
            } else {
                ageFeedback.textContent = '';
                return true;
            }
        }
        document.getElementById('faculty_contact').addEventListener('input', function() {
            var phoneInput = document.getElementById('faculty_contact');
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

        
        function validateDate() {
            const dateField = document.getElementById('faculty_doj');
            const selectedDate = new Date(dateField.value);
            const today = new Date();
            
            // Set time to midnight for accurate comparison
            today.setHours(0, 0, 0, 0);

            if (selectedDate < today) {
                alert('Date of joining cannot be in the past.');
                return false;
            }
            return true;
        }

        window.onload = function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('faculty_doj').setAttribute('min', today);
        };
    
    
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function confirmUpdate() {
            var form = document.getElementById('faculty-form');
            if (confirm('Are you sure you want to update these details?')) {
                form.submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\facultyinfoupdate.blade.php ENDPATH**/ ?>