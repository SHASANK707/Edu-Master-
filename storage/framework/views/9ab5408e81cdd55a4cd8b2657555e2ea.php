<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Info Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
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

    <div class="container">
        <h2 class="form-title"> Edit Student Timetable </h2>
        
        <form method="POST" action="<?php echo e(url('/studentTimetable/update')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="student_timetable">Student Timetable</label>
                <input type="text" class="form-control" id="stud_timetable" name="stud_timetable" value="<?php echo e($timetable->stud_timetable); ?>" placeholder="Enter student timetable ID" required>
            </div>

            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo e($timetable->student_id); ?>" placeholder="Enter student_id" required>
            </div>

            <div class="form-group">
                <label for="class_id">Class ID</label>
                <input type="text" class="form-control" id="class_id" name="class_id" value="<?php echo e($timetable->class_id); ?>" placeholder="Enter class_id" required>
            </div>

            <div class="form-group">
                <label for="faculty_id">Faculty ID</label>
                <input type="text" class="form-control" id="faculty_id" name="faculty_id" value="<?php echo e($timetable->faculty_id); ?>" placeholder="Enter faculty_id" required>
            </div>

            

            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo e($timetable->course_id); ?>" placeholder="Enter course_id" required>
            </div>

            <div class="form-group">
                <label for="day">Day</label>
                <select class="form-control" id="day" name="day" required>
                    <option value="" disabled selected>Select Day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time">Time </label>
                <input type="time" class="form-control" id="time" name="time" value="<?php echo e($timetable->time); ?>" placeholder="Enter Time" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo e($timetable->location); ?>" placeholder="Enter Class Location" required>
            </div>
            <input type="hidden" name="update_id" value="<?php echo e($timetable->stud_timetable); ?>">

            
            <button type="submit" class="btn btn-primary" name="save">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\example-12\resources\views\studtimeinfoupdate.blade.php ENDPATH**/ ?>