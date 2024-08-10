<?php $__env->startSection('content'); ?>

    <!-- <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="<?php echo e(route('student.form')); ?>" class="btn btn-dark">ADD</a>
        </div>
    </div> -->
    <div>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Class Name</th>
                <th>Student Name </th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Parent Contact Number</th>
                <th>Other Contact</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $studnt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($member->institute_id == Auth::user()->institute_id): ?>
                <tr>
                    <td><?php echo e($member->student_id); ?></td>
                    <td><?php echo e($class_name = DB::table('class')->where('class_id', $member->class_id)->value('class_name')); ?></td>
                    <td><?php echo e($member->student_name); ?></td>
                    <td><?php echo e($member->dob); ?></td>
                    <td><?php echo e($member->gender); ?></td>
                    <td><?php echo e($member->address); ?></td>
                    <td><?php echo e($member->parent_guardian_contact_info); ?></td>
                    <td><?php echo e($member->other_contact); ?></td>
                    <td><?php echo e($member->email_address); ?></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\facultydashstudentshow.blade.php ENDPATH**/ ?>