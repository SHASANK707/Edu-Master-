<?php $__env->startSection('content'); ?>
    <!-- <a class="button" href="<?php echo e(URL::to('parent')); ?>">Add parent</a> -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="<?php echo e(URL::to('parent')); ?>" class="btn btn-dark">ADD</a>
        </div>
    </div>

    <?php if(session('success')): ?>
<div class="alert alert-success" id="success-message">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Parent ID</th>
                <th>Parent Name</th>
                <th>Contact Number</th>
                <th>Parent Email</th>
                <th>Address</th>
                <th>Student ID</th>
                <th>Relationship to Student</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->institute_id == Auth::user()->institute_id): ?>
            <tr>
                <td><?php echo e($item->parent_id); ?></td>
                <td><?php echo e($item->parent_name); ?></td>
                <td><?php echo e($item->contact_number); ?></td>
                <td><?php echo e($item->parent_email); ?></td>
                <td><?php echo e($item->address); ?></td>
                <td><?php echo e($item->student_id); ?></td>
                <td><?php echo e($item->relationship_to_student); ?></td>
                <td><a href="<?php echo e(URL::to('parent/deleteRecord/'.$item->parent_id)); ?>" onclick="return confirmDelete()">Delete</a></td>
                <td><a href="<?php echo e(URL::to('parent/updateRecord/'.$item->parent_id)); ?>">Edit</a></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }

        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 2000); // 5000 milliseconds = 5 seconds
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\parentinfoview.blade.php ENDPATH**/ ?>