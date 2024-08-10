<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Institute Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .btn-back {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007BFF;
      color: #FFFFFF;
      text-decoration: none;
      font-weight: bold;
      position: absolute;
      top: 25px; /* Adjust based on your header's height */
      left: 80px; /* Adjust based on your container's padding */
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <a href="<?php echo e(URL::to('/login')); ?>" class="btn btn-secondary btn-back">Back</a>
  <div class="container">
    <form action="<?php echo e(URL::to('admin/insert_institute')); ?>" method="post" class="needs-validation" novalidate>
      <h2 class="text-center mb-4">Super Admin Registration</h2>
      <?php echo csrf_field(); ?>
      
      <div class="form-group">
        <label for="institute_name">Super Admin Name</label>
        <input type="text" id="institute_name" value="<?php echo e(old('institute_name')); ?>" name="institute_name" class="form-control" required placeholder="Super Admin institute name">
        <span style="color: red"><?php $__errorArgs = ['institute_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please enter an institute name.
        </div>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="<?php echo e(old('address')); ?>" class="form-control" required placeholder="Enter address">
        <span style="color: red"><?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please add an address.
        </div>
      </div>
      <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" id="contact" value="<?php echo e(old('contact')); ?>" name="contact" class="form-control" maxlength="10" placeholder="Enter contact number">
        <span style="color: red"><?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please add a valid contact number.
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required placeholder="Enter email">
        <span style="color: red"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please enter a valid email address.
        </div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" required placeholder="Enter password">
        <span style="color: red"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please enter a valid password.
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
  </div>
  <script>
    (function() {
      'use strict';
      var forms = document.querySelectorAll('.needs-validation');
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
    })();
  </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\example-12\resources\views\admininsert.blade.php ENDPATH**/ ?>