<?php $__env->startPush('styles'); ?>
<style>
    :root {
        --primary-color: #4CAF50;
        --secondary-color: #FFC107;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #F4F4F4;
    }

    .header {
        background-color: #4682B4;
        color: white;
        padding: 1em;
        text-align: center;
    }

    .navbar {
        background-color: var(--secondary-color);
        padding: 1em;
    }

    .navbar ul {
        list-style-type: none;
        padding: 0;
    }

    .navbar li {
        display: inline;
        margin: 0 10px;
    }

    .navbar a {
        color: white;
        text-decoration: none;
    }

    .main-content {
        display: flex;
        justify-content: center;
        padding: 2em;
    }

    .card {
        background-color: white;
        padding: 1em;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 80%;
        /* Increase the card width */
        max-width: 1200px;
        /* Optional max-width for larger screens */
        margin: 1em auto;
        /* Center the card */
    }

    .card h2 {
        text-align: center;
    }

    .card table {
        width: 100%;
        /* Make the table take up the full width of the card */
        border-collapse: collapse;
    }

    .card th,
    .card td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .update-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: var(--primary-color);
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-bottom: 10px;
        /* Add some space below the button */
    }

    .update-button:hover {
        background-color: #3E8E41;
    }

    .footer {
        background-color: var(--primary-color);
        color: white;
        text-align: center;
        padding: 1em;
        position: fixed;
        width: 100%;
        bottom: 0;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<header class="header">
    <h1>Welcome, <?php echo e($student_name); ?></h1>
</header>

<main class="main-content">
    <div class="card">
        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <h2>Student Information</h2>
        <a href="<?php echo e(URL::to('student_dashboard/edit/'.$student_id)); ?>" class="update-button">Update</a>
        <table>
            <tr>
                <th>Class Name</th>
                <td><?php echo e($class_name = DB::table('class')->where('class_id', $class_id)->value('class_name')); ?></td>
            </tr>
            <tr>
                <th>Institute ID</th>
                <td><?php echo e($institute_id); ?></td>
            </tr>
            <tr>
                <th>Student Name</th>
                <td><?php echo e($student_name); ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo e($dob); ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo e($gender); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo e($address); ?></td>
            </tr>
            <tr>
                <th>Parent/Guardian Contact Info</th>
                <td><?php echo e($parent_guardian_contact_info); ?></td>
            </tr>
            <tr>
                <th>Other Contact</th>
                <td><?php echo e($other_contact); ?></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><?php echo e($email_address); ?></td>
            </tr>
        </table>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-12\resources\views\studentdashboard.blade.php ENDPATH**/ ?>