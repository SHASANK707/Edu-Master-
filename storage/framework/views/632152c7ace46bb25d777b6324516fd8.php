<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <h1>Welcome to Edu-Master</h1>
    <p>Your account has been created successfully. Here are your login details:</p>
    <p>Email: <?php echo e($mailData['email']); ?></p>
    <p>Password: <?php echo e($mailData['password']); ?></p>
    <p>Please keep this information secure.</p>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\example-12\resources\views\email\Demomail.blade.php ENDPATH**/ ?>