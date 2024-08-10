<?php $__env->startSection('content'); ?>
    <div class="container form-container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Submit Your Details</h2>
                <form id="updateForm" action="<?php echo e(route('clss.update')); ?>" method="POST" onsubmit="return confirmSubmission()">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="class_name">Class Name</label>
                        <input type="text" class="form-control" id="class_name" name="class_name" value="<?php echo e($class->class_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="faculty_id">Class Teacher</label>
                        <select class="form-control" id="faculty_id" name="faculty_id" required>
                            <option value="<?php echo e($class->faculty_id); ?>">Select Class Teacher</option>
                            <?php $__currentLoopData = $facultyNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty_id => $faculty_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($faculty_id || old('$faculty_id')); ?>"><?php echo e($faculty_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php echo e($class->location); ?>" required>
                    </div>
                    <input type="hidden" name="update_id" value="<?php echo e($class->class_id); ?>">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmSubmission() {
            return confirm("Are you sure you want to submit these details?");
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\clssEdit.blade.php ENDPATH**/ ?>