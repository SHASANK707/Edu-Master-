<!-- resources/views/course.blade.php -->


<?php $__env->startSection('title', 'Institute Course'); ?>

<?php $__env->startSection('css'); ?>
<style>
    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;
        position: absolute;
        top: 45px; /* Adjust based on your header's height */
        left: 75px; /* Adjust based on your container's padding */
        border-radius: 5px;
        cursor: pointer;
    }
    /* Custom CSS for the dropdown */
    .custom-dropdown {
      width: 100%;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .custom-dropdown:focus {
      color: #495057;
      background-color: #fff;
      border-color: #80BDFF;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .readonly-input {
      background-color: #E9ECEF;
      opacity: 1;
      color: #495057;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <button onclick="location.href='<?php echo e(URL::to('/course/courseview')); ?>'" class="btn-back">Back</button>
  <div class="container">
    <form action="<?php echo e(URL::to('course/add_course')); ?>" method="post" class="needs-validation" novalidate onsubmit="return confirmSubmit()">
      <h2 class="text-center mb-4">Course Registration</h2>
      <?php echo csrf_field(); ?>
      <div class="form-group">
        <label for="institute_id">Institute Name</label>
        <select name="institute_id" id="institute_id" class="custom-dropdown" aria-placeholder="Institute Name  ">
          <option value="" disabled selected>Select Institute Name</option>
          <?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($data->institute_id); ?>"><?php echo e($data->institute_name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span style="color: red"><?php $__errorArgs = ['institute_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please select an institute Name.
        </div>
      </div>
      
      
      <div class="form-group">
        <label for="course_name">Course Name</label>
        <input type="text" id="course_name" name="course_name" value="<?php echo e(old('course_name')); ?>" class="form-control" required>
        <span style="color: red"><?php $__errorArgs = ['course_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
        <div class="invalid-feedback">
          Please enter a course name.
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  function confirmSubmit() {
    return confirm('Are you sure you want to submit this form?');
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\courseadd.blade.php ENDPATH**/ ?>