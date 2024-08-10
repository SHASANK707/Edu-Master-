<?php $__env->startSection('title', 'Edit Institute'); ?>
<?php $__env->startSection('css'); ?>
<style>
    body {
        background-color: #F4F4F4;
    }
    .container {
        margin-top: 50px;
    }
    .card {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007BFF;
        color: white;
    }
    .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
    }
    .btn-primary:hover {
        background-color: #0056B3;
        border-color: #0056B3;
    }
    /* Confirmation Pop-up CSS */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
        z-index: 999; /* ensures it appears above everything else */
    }
    .popup-content {
        background-color: white;
        width: 300px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .button-container {
        margin-top: 20px;
    }
    .confirm-btn, .cancel-btn {
        padding: 10px 20px;
        margin: 0 10px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
    }
    .confirm-btn {
        background-color: #4CAF50;
        color: white;
    }
    .cancel-btn {
        background-color: #F44336;
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <a href="<?php echo e(URL::to('/institute/instituteshow')); ?>" class="btn btn-secondary" style="position: absolute; top: 45px; left: 80px; background-color: #007BFF"> Back</a>
        <div class="card">
            <div class="card-header">
                <h1>Edit Institute</h1>
            </div>
            <div class="card-body">
                <form id="editInstituteForm" action="<?php echo e(URL::to('institute/update_institute/' . $user->institute_id)); ?>" method="POST" onsubmit="return confirmFormSubmission(event)">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                        <label for="institute_id">Institute ID:</label>
                        <input type="number" class="form-control" id="institute_id" name="institute_id" value="<?php echo e($user->institute_id); ?>" readonly>
                        <span style="color: red"><?php $__errorArgs = ['institute_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="institute_name">Institute Name:</label>
                        <input type="text" class="form-control" id="institute_name" name="institute_name" value="<?php echo e($user->institute_name); ?>" required>
                        <span style="color: red"><?php $__errorArgs = ['institute_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo e($user->address); ?>" required>
                        <span style="color: red"><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" pattern="\d*" class="form-control" id="contact" name="contact" value="<?php echo e($user->contact); ?>" maxlength="10">
                        <span style="color: red"><?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
                        <span style="color: red"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="updateButton">Update Institute</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
function confirmFormSubmission(event) {
    event.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Do you want to save the changes?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willSubmit) => {
        if (willSubmit) {
            event.target.submit();
        }
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\instituteedit.blade.php ENDPATH**/ ?>