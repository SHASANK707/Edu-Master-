<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Timetable</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            border: 2px solid black;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: lightblue;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: red;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
            position: fixed;
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
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1>Timetable info -></h1>
    <a class="button" href="{{ URL::to('studentTimetable') }}">Add Student Timetable</a>
    <br>
    <table>
        <thead>
            <tr>
                <th>stud_timetable</th>
                <th>student Id</th>
                <th>class Id</th>
                <th>faculty Id</th>
                <th>course Id</th>
                <th>day</th>
                <th>time</th>
                <th>location</th>
                <th>Delete!!</th>
                <th>Update!!</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($Timetables as $item)
            <tr>
                <td> {{ $item->stud_timetable}} </td>
                <td> {{ $item->student_id}} </td>
                <td> {{ $item->class_id}} </td>
                <td> {{ $item->faculty_id}} </td>
                <td> {{ $item->course_id}} </td>
                <td> {{ $item->day}} </td>
                <td> {{ $item->time}} </td>
                <td> {{ $item->location}} </td>
                
                <td>
                    <a href=" {{URL::to('studentTimetable/delete/'.$item->stud_timetable)}} ">Delete</a>
                </td>
                <td>
                    <a href="{{URL::to('studentTimetable/updateshow/'.$item->stud_timetable)}}">Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>