<!doctype html>
<html lang="en">
  <head>
    <title>Communication</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
   
      label{
        font-size: large;
        font-weight: bold;
      }

      .btn-primary{
        background-color:crimson;
        color: #fff;
        border: none;
             
      }

      .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            /* Text color */
            background-color: #007BFF;
            /* Background color */
            border: none;
            border-radius: 5px;
            /* Rounded corners */
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            /* Smooth transition effects */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            position: absolute;
            /* Fixed position */
            top: 30px;
            /* Distance from top */
            right: 70px;
            /* Distance from right */
            z-index: 1000;
            /* Ensures the button is on top */
        }
        /* Hover effect */
        .button:hover {
            background-color: violet;
            /* Darker shade on hover */
            transform: translateY(-2px);
            /* Slight lift on hover */
        }
        /* Active effect */
        .button:active {
            background-color: green;
            /* Even darker shade on click */
            transform: translateY(0);
            /* Reset lift effect */
        }
        /* Focus effect */
        .button:focus {
            outline: none;
            /* Remove default focus outline */
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
            /* Custom focus outline */
        }
    </style>


  </head>
  <body>
      <form action="<?php echo e(URL::to('communication/store')); ?>" method="post">
      <?php echo csrf_field(); ?>
    <div class="container">
        <h1 class="text-center">Information</h1>
    
        <div class="form-group">
          <label for="">Communication ID</label>
          <input type="text" name="communication_id" id="" class="form-control" placeholder="" 
          aria-describedby="helpId">
          <span class="text-danger">
            <?php $__errorArgs = ['communication_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </span>
          
        </div>

        <div class="form-group">
          <label for="">Staff ID</label>
          <input type="text" name="staff_id" id="" class="form-control" placeholder="" 
            aria-describedby="helpId">
          <span class="text-danger">
            <?php $__errorArgs = ['staff_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </span>
          
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" placeholder="" 
                aria-describedby="helpId"></textarea>
            <span class="text-danger">
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </span>
            
        </div>

        <div class="form-group">
  <label for="notification">Notification</label>
  <input type="text" name="notification" id="notification" class="form-control" placeholder="Enter notification method" 
   aria-describedby="notificationHelp">
  <span class="text-danger">
    <?php $__errorArgs = ['notification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <?php echo e($message); ?>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </span>
  <small id="notificationHelp" class="text-muted">Preferred method of notification (e.g., Email, SMS).</small>
</div>

        <div class="form-group">
          <label for="">Meeting Schedule</label>
          <input type="datetime-local" name="meeting_schedule" id="" class="form-control" placeholder="" 
            aria-describedby="helpId">
          <span class="text-danger">
            <?php $__errorArgs = ['meeting_schedule'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </span>
          
        </div>

        
        <a class="button" href="<?php echo e(URL::to('communication/view')); ?>" >Show Data</a>
        <button type="submit" class="btn-primary" name="save">
            Submit
        </button>
        
        </form>

    </div>

  </body>
</html><?php /**PATH C:\xampp\htdocs\example-12\resources\views\communication.blade.php ENDPATH**/ ?>