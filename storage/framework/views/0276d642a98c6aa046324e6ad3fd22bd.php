<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success" id="success-message">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<!-- <a class="button" href="<?php echo e(URL::to('faculty')); ?>">Add Faculty Info</a> -->
<div class="row justify-content-center mt-4">
    <div style="text-align: left;  ">
        <a  style="background-color: #626cd6;" href="<?php echo e(URL::to('faculty')); ?>" class="btn btn-dark">ADD</a>
    </div>
</div>
<br>
<table>
    <thead>
        <tr>
            <th>Faculty ID</th>
            <th>Faculty Name</th>
            <!-- <th>faculty_age</th> -->
            <th>Faculty DOB</th>
            <th>Faculty Gender</th>
            <th>Faculty Contact</th>
            <th>Faculty Address</th>
            <th>Faculty Email</th>
            <th>Faculty Qualification</th>
            <th>Faculty DOJ</th>
            <th>Faculty Specializations</th>
            <th>Faculty Experience</th>
            <th>Faculty Designation</th>
            <th>Faculty Department</th>
            <th>Delete!!</th>
            <th>Update!!</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->institute_id == Auth::user()->institute_id): ?>
        <tr>
            <td> <?php echo e($item->faculty_id); ?> </td>
            <td> <?php echo e($item->faculty_name); ?> </td>
            <!-- <td> <?php echo e($item->faculty_age); ?> </td> -->
            <td> <?php echo e($item->faculty_dob); ?> </td>
            <td> <?php echo e($item->faculty_gender); ?> </td>
            <td> <?php echo e($item->faculty_contact); ?> </td>
            <td> <?php echo e($item->faculty_address); ?> </td>
            <td> <?php echo e($item->faculty_email); ?> </td>
            <td> <?php echo e($item->faculty_qualification); ?> </td>
            <td> <?php echo e($item->faculty_doj); ?> </td>
            <td> <?php echo e($item->faculty_specializations); ?> </td>
            <td> <?php echo e($item->faculty_experience); ?> </td>
            <td> <?php echo e($item->faculty_designation); ?> </td>
            <td> <?php echo e($item->faculty_department); ?> </td>
            <td>
                <a href="<?php echo e(URL::to('faculty/delete/'.$item->faculty_id)); ?>" onclick="return confirmDelete()">Delete</a>
            </td>
            <td>
                <a href="<?php echo e(URL::to('faculty/updateshow/'.$item->faculty_id)); ?>">Update</a>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this faculty member?');
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

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\facultyinfoview.blade.php ENDPATH**/ ?>