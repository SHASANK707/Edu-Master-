<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Management System</title>
    @stack('styles')
    <!-- Bootstrap CSS -->
    @stack('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
            padding-bottom: 60px;
            /* Space for footer */
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            background: linear-gradient(45deg, #000273, #22016E, #450075, #6A0068);
            color: #fff;
            width: 250px;
            min-width: 250px;
            padding-top: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 1000;
            /* Ensure the sidebar is always on top */
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: transparent;
            text-align: center;
        }

        #sidebar .sidebar-header h3 {
            margin: 0;
            font-size: 1.5em;
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color: #fff;
        }

        #sidebar ul li a:hover {
            color: #1c7ed6;
            background: #e9ecef;
            text-decoration: none;
        }

        #content {
            width: 100%;
            padding: 20px;
        }

        .navbar {
            background: #1c7ed6;
            color: #fff;
        }

        .logout-button {
            background: linear-gradient(45deg, #000273, #22016E, #450075, #6A0068);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .logout-button a {
            color: white;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #101111;
        }

        .footer {
            height: 35px;
            width: 100%;
            padding: 10px;
            background: linear-gradient(45deg, #000273, #22016E, #450075, #6A0068);
            color: #fff;
            text-align: center;
            font-family: "Montserrat", sans-serif;
            border-top: 5px solid #4954d0;
            position: fixed;
            bottom: 0;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #DADAF2;
        }

        .footer .social-icons a {
            display: inline-block;
            margin: 0 10px;
        }

        .footer p {
            margin-top: 0;
            font-size: 14px;
        }

        .footer .social-icons a i {
            font-size: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Ensures padding does not affect overall width */
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
            /* Allows vertical resizing, generally a good UX choice */
        }

        .form-group button[type="submit"] {
            width: 100%;
            padding: 10px 0;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-container {
                width: calc(100% - 40px);
            }
        }


        .button-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button-link:hover {
            background-color: #0056b3;
        }

        /* view css */
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 5px;
        }

        thead {
            background: linear-gradient(45deg, #000273, #22016E, #450075, #6A0068);
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
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Education Management System</h3>
            </div>
            <ul class="list-unstyled components">
                @if (Auth::user()->role === 'Student')
                    <li class="active">
                        <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Student</a>
                        <ul class="collapse list-unstyled" id="studentSubmenu">
                            <li><a href="{{ url('/student_dashboard') }}"
                                    onclick="displayInfo('student', 'student_dashboard')">Student Dashboard</a></li>
                            <li><a href="#" onclick="displayInfo('student', 'attendance')">Attendance</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role === 'Institute')
                    <li>
                        <a href="#instituteSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Institute</a>
                        <ul class="collapse list-unstyled" id="instituteSubmenu">
                            <li><a href="{{ url('/institute/instituteshow') }}"
                                    onclick="displayInfo('institute', 'view institute')">View Institute</a></li>
                            <li><a href="{{ url('/course/courseview') }}"
                                    onclick="displayInfo('institute', 'classes')">Course</a></li>
                            <li><a href="#" onclick="displayInfo('institute', 'schedule')">Schedule</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role === 'Faculty')
                    <li class="active">
                        <a href="#teacherSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Faculty</a>
                        <ul class="collapse list-unstyled" id="teacherSubmenu">
                            <li><a href="{{ url('/faculty_dashboard') }}" onclick="displayInfo('teacher', 'classes')">Show
                                    Info</a></li>
                            <li><a href="{{ url('/faculty_dashboard/showstudent') }}"
                                    onclick="displayInfo('teacher', 'schedule')">Show Students</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role === 'Management')
                    <li>
                        <a href="#managementSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Management</a>
                        <ul class="collapse list-unstyled" id="managementSubmenu">
                            <li><a href="{{ url('/student/view') }}"
                                    onclick="displayInfo('student', 'add_student')">Student</a></li>
                            <li><a href="{{ url('/staff/form/view') }}"
                                    onclick="displayInfo('management', 'add_staff')">Staff</a></li>
                            <li><a href="{{ url('/clss/view') }}" onclick="displayInfo('management', 'add_class')">Class</a>
                            </li>
                            <li><a href="{{ url('/faculty/show') }}"
                                    onclick="displayInfo('management', 'add_faculty')">Faculty</a></li>
                            <li><a href="{{ url('/parent/show') }}" onclick="displayInfo('parents', 'children')">Parent</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role === 'Parents')
                    <li>
                        <a href="#parentsSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Parents</a>
                        <ul class="collapse list-unstyled" id="parentsSubmenu">
                            <li><a href="{{ url('/parentdashboard') }}"
                                    onclick="displayInfo('parents', 'progress')">Dashboard</a></li>
                            <li><a href="#" onclick="displayInfo('parents', 'messages')">Messages</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Other navbar content -->
                    <!-- Logout Section -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <div class="logout-button">
                                    <a href="{{ route('logout') }}">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Content will be injected here -->
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Connect with us:</p>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2024 Top-Notch. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
</body>

</html>