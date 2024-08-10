@extends('index')
@push('styles')
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
@endpush

@section('content')
<header class="header">
    <h1>Welcome, Faculty {{$faculty_name}}</h1>
</header>
<main class="main-content">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h2>Faculty Information</h2>
        <a href="{{URL::to('faculty_dashboard/updateshow/'.$faculty_id)}}" class="update-button">Update</a>
        <table>
            <tr>
                <th>Faculty ID</th>
                <td>{{$faculty_id}}</td>
            </tr>
            <tr>
                <th>Institute ID</th>
                <td>{{$institute_id}}</td>
            </tr>
            <tr>
                <th>Faculty Name</th>
                <td>{{$faculty_name}}</td>
            </tr>
            <tr>
                <th>Faculty DOB</th>
                <td>{{$faculty_dob}}</td>
            </tr>
            <tr>
                <th>Faculty Gender</th>
                <td>{{$faculty_gender}}</td>
            </tr>
            <tr>
                <th>Faculty Contact</th>
                <td>{{$faculty_contact}}</td>
            </tr>
            <tr>
                <th>Faculty Address</th>
                <td>{{$faculty_address}}</td>
            </tr>
            <tr>
                <th>Faculty Email</th>
                <td>{{$faculty_email}}</td>
            </tr>
            <tr>
                <th>Faculty Qualification</th>
                <td>{{$faculty_qualification}}</td>
            </tr>
            <tr>
                <th>Faculty DOJ</th>
                <td>{{$faculty_doj}}</td>
            </tr>
            <tr>
                <th>Faculty Specialization</th>
                <td>{{$faculty_specializations}}</td>
            </tr>
            <tr>
                <th>Faculty Experience</th>
                <td>{{$faculty_experience}}</td>
            </tr>
            <tr>
                <th>Faculty Designation</th>
                <td>{{$faculty_designation}}</td>
            </tr>
            <tr>
                <th>Faculty Department</th>
                <td>{{$faculty_department}}</td>
            </tr>
        </table>
    </div>
</main>
@endsection
