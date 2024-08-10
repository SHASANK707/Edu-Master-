<?php $__env->startSection('title', 'All Institutes'); ?>


<?php $__env->startSection('content'); ?>
<button onclick="location.href='<?php echo e(URL::to('/institute/insertinstitute')); ?>'" >Add Institute</button>

    <h1>All Institutes</h1>
    <table>
        <thead>
            <tr>
                <th>Institute ID</th>
                <th>Institute Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td data-label="Institute ID"><?php echo e($field->institute_id); ?></td>
                    <td data-label="Institute Name"><?php echo e($field->institute_name); ?></td>
                    <td data-label="Address"><?php echo e($field->address); ?></td>
                    <td data-label="Contact"><?php echo e($field->contact); ?></td>
                    <td data-label="Email"><?php echo e($field->email); ?></td>
                    <td data-label="Actions" class="actions">
                        <a href="<?php echo e(URL::to('institute/delete_institute/'.$field->institute_id)); ?>"  class="delete-link" onclick="confirm(event)">Delete</a>
                        <a href="<?php echo e(URL::to('institute/edit_institute/'.$field->institute_id)); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php if(Session::has('message')): ?>
    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
 <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
function confirm(event)
{
    event.preventDefault();
    var url = event.currentTarget.getAttribute('href');
    console.log(url);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href=url;
        }
    })
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .btn-add-institute {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;
        position: absolute;
        top: 50px;
        margin: 52px 0px;
        /* Adjust based on your header's height */
        right: 120px;
        /* Adjust based on your container's padding */
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;
        position: absolute;
        top: 50px;
        /* Adjust based on your header's height */
        left: 120px;
        /* Adjust based on your container's padding */
        border-radius: 5px;
        cursor: pointer;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #F4F4F4;
    }

    .container {
        width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    thead th {
        background-color: #007bff;
    }

    tbody tr:nth-child(even) {
        background-color: #F9F9F9;
    }

    tbody tr:hover {
        background-color: #F1F1F1;
    }

    .actions a {
        margin-right: 10px;
        text-decoration: none;
        color: #007BFF;
        font-weight: bold;
    }

    .actions a:hover {
        text-decoration: underline;
    }

    .alert {
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 20px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .container {
            width: 100%;
            padding: 10px;
        }

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        thead tr {
            display: none;
        }

        tbody tr {
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
        }

        tbody td {
            border: none;
            padding: 10px;
            position: relative;
            padding-left: 50%;
        }

        tbody td:before {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            content: attr(data-label);
            font-weight: bold;
        }
    }

    /* Confirmation Pop-up CSS */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* semi-transparent black background */
        z-index: 999;
        /* ensures it appears above everything else */
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

    .confirm-btn,
    .cancel-btn {
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
        background-color: #FAFAFA;
        color: rgb(0, 0, 0);
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\instituteshow.blade.php ENDPATH**/ ?>