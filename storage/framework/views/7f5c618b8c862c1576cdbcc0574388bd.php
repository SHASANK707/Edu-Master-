<?php $__env->startSection('content'); ?>
<div class="row justify-content-center mt-4">
    <div class="col-md-10 d-flex justify-content-end">
        <a href="<?php echo e(route('form.index')); ?>" class="btn btn-dark">Add</a>
    </div>
</div>
<div>

    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success" id="success-message">
                <?php echo e(session('success')); ?>

            </div>
    </div>
    <?php endif; ?>
</div>

<table>
    <thead>
        <tr>
            <th>Staff ID</th>
            <th>Institute ID</th>
            <th>Staff Name</th>
            <th>Gender</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($member->institute_id == Auth::user()->institute_id): ?>
            <tr>
                <td><?php echo e($member->staff_id); ?></td>
                <td><?php echo e($member->institute_id); ?></td>
                <td><?php echo e($member->staff_name); ?></td>
                <td><?php echo e($member->gender); ?></td>
                <td><?php echo e($member->contact_number); ?></td>
                <td><?php echo e($member->email); ?></td>
                <td><?php echo e($member->address); ?></td>
                <td><?php echo e($member->designation); ?></td>
                <td><?php echo e($member->department); ?></td>
                <td>
                    <a href="<?php echo e(route('form.edit',$member->staff_id)); ?>" class="btn btn-dark edit-btn">Edit</a>
                    <a href="<?php echo e(route('view.destroy',$member->staff_id)); ?>" class="btn btn-danger delete-btn">Delete</a>
                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


    <script>
        // Confirm before navigating to edit page
        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to edit this item?')) {
                    e.preventDefault();
                }
            });
        });

        // Confirm before deleting
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to delete this item?')) {
                    e.preventDefault();
                }
            });
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
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\viewdata.blade.php ENDPATH**/ ?>