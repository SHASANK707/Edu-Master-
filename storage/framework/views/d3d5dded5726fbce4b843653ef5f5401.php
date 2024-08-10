<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Update Student Information</h1>
    <form id="update-form" action="<?php echo e(route('student.update')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="class_id">Class Name</label>
                <select name="class_id" class="form-control" required>
                    <option value="">Select Class</option>
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_id => $class_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($class_id); ?>" <?php echo e(old('class_id', $stored_class_id) == $class_id ? 'selected' : ''); ?>>
                        <?php echo e($class_name); ?>

                    </option>
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


            <div class="form-group col-md-6">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" class="form-control" value="<?php echo e($studnt->student_name); ?>" aria-describedby="helpId">
                <span class="text-danger">
                    <?php $__errorArgs = ['student_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dob">DOB</label>
                <input type="date" name="dob" class="form-control" value="<?php echo e($studnt->dob); ?>" aria-describedby="helpId">
                <span class="text-danger">
                    <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control" aria-describedby="helpId">
                    <option value="">Select Gender</option>
                    <option value="male" <?php echo e(old('gender', $studnt->gender) == 'male' ? 'selected' : ''); ?>>Male</option>
                    <option value="female" <?php echo e(old('gender', $studnt->gender) == 'female' ? 'selected' : ''); ?>>Female</option>
                    <option value="other" <?php echo e(old('gender', $studnt->gender) == 'other' ? 'selected' : ''); ?>>Other</option>
                </select>
                <span class="text-danger">
                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo e($studnt->address); ?>" aria-describedby="helpId">
                <span class="text-danger">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="parent_guardian_contact_info">Parent/Guardian Contact Info</label>
                <input type="tel" name="parent_guardian_contact_info" class="form-control" value="<?php echo e($studnt->parent_guardian_contact_info); ?>" maxlength="10" aria-describedby="helpId">
                <span class="text-danger">
                    <?php $__errorArgs = ['parent_guardian_contact_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="other_contact">Other Contact</label>
                <input type="tel" name="other_contact" class="form-control" value="<?php echo e($studnt->other_contact); ?>" maxlength="10" aria-describedby="helpId">
                <span class="text-danger">
                    <?php $__errorArgs = ['other_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="email_address">Email</label>
                <input type="email" name="email_address" class="form-control" value="<?php echo e($studnt->email_address); ?>" aria-describedby="helpId">
                <span class="text-danger">
                    <?php $__errorArgs = ['email_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </span>
            </div>
        </div>

        <input type="hidden" name="update_id" value="<?php echo e($studnt->student_id); ?>">
        <button type="button" class="btn btn-primary" onclick="confirmUpdate()">UPDATE</button>
    </form>
</div>

<script>
    function confirmUpdate() {
        if (confirm('Are you sure you want to update this student information?')) {
            document.getElementById('update-form').submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\studentEdit.blade.php ENDPATH**/ ?>