    
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="<?php echo e(route('clss.form')); ?>" class="btn btn-dark">ADD</a>
        </div>
    </div>
    <div>
        <?php if(session('success')): ?>
            <div class="alert alert-success" id="success-message">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Class Teacher</th>
                <th>Location </th>
                <th>Delete</th>
                <th>Edit</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    
                    <td><?php echo e($member->class_name); ?></td>
                    <td><?php echo e($faculty_name = DB::table('faculty_info')->where('faculty_id', $member->faculty_id)->value('faculty_name')); ?></td>
                    <td><?php echo e($member->location); ?></td>
                    <td><a href="<?php echo e(URL::to('clss/delete/'.$member->class_id)); ?>" onclick="return confirmDelete()">
                        <button>Delete</button></a></td>
                    <td><a href="<?php echo e(URL::to('clss/edit/'.$member->class_id)); ?>"><button>Edit</button></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }

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
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\clssView.blade.php ENDPATH**/ ?>