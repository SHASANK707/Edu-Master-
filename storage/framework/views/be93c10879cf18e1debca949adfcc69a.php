<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Information View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <style> 
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 5px;
        }
        thead {
            background-color: #007BFF;
            color: #FFFFFF;
        }
        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        tbody tr:nth-child(odd) {
            background-color: #F2F2F2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
    </style>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="<?php echo e(route('communication.form')); ?>" class="btn btn-dark">Create</a>
        </div>
    </div>
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
                <th>Communication ID</th>
                <th>Staff_id</th>
                <th>Message </th>
                <th>Notification </th>
                <th>Meeting Schedule </th>
                <th>Delete</th>
                <th>Edit</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($member->communication_id); ?></td>
                    <td><?php echo e($member->staff_id); ?></td>
                    <td><?php echo e($member->notification); ?></td>
                    <td><?php echo e($member->message); ?></td>
                    <td><?php echo e($member->meeting_schedule); ?></td>
                    <td><a href="<?php echo e(URL::to('communication/delete/'.$member->communication_id)); ?>">
                        <button>Delete</button></a></td>
                    <td><a href="<?php echo e(URL::to('communication/edit/'.$member->communications_id)); ?>"><button>Edit</button></a></td>
                    
                    <td>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\example-12\resources\views\communicationview.blade.php ENDPATH**/ ?>