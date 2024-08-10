@extends('index')
@section('content')
@if (session('success'))
<div class="alert alert-success" id="success-message">
    {{ session('success') }}
</div>
@endif
<!-- <a class="button" href="{{ URL::to('faculty') }}">Add Faculty Info</a> -->
<div class="row justify-content-center mt-4">
    <div style="text-align: left;  ">
        <a  style="background-color: #626cd6;" href="{{ URL::to('faculty') }}" class="btn btn-dark">ADD</a>
    </div>
</div>
<br>
<table>
    <thead>
        <tr>
            <th>Faculty ID</th>
            <th>Faculty Name</th>
            <!-- <th>faculty_age</th> -->
            <th>Faculty DOB</th>
            <th>Faculty Gender</th>
            <th>Faculty Contact</th>
            <th>Faculty Address</th>
            <th>Faculty Email</th>
            <th>Faculty Qualification</th>
            <th>Faculty DOJ</th>
            <th>Faculty Specializations</th>
            <th>Faculty Experience</th>
            <th>Faculty Designation</th>
            <th>Faculty Department</th>
            <th>Delete!!</th>
            <th>Update!!</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faculties as $item)
        @if($item->institute_id == Auth::user()->institute_id)
        <tr>
            <td> {{ $item->faculty_id}} </td>
            <td> {{ $item->faculty_name}} </td>
            <!-- <td> {{ $item->faculty_age}} </td> -->
            <td> {{ $item->faculty_dob}} </td>
            <td> {{ $item->faculty_gender}} </td>
            <td> {{ $item->faculty_contact}} </td>
            <td> {{ $item->faculty_address}} </td>
            <td> {{ $item->faculty_email}} </td>
            <td> {{ $item->faculty_qualification}} </td>
            <td> {{ $item->faculty_doj}} </td>
            <td> {{ $item->faculty_specializations}} </td>
            <td> {{ $item->faculty_experience}} </td>
            <td> {{ $item->faculty_designation}} </td>
            <td> {{ $item->faculty_department}} </td>
            <td>
                <a href="{{URL::to('faculty/delete/'.$item->faculty_id)}}" onclick="return confirmDelete()">Delete</a>
            </td>
            <td>
                <a href="{{URL::to('faculty/updateshow/'.$item->faculty_id)}}">Update</a>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this faculty member?');
        }

        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 2000); // 5000 milliseconds = 5 seconds
            }
        });
    </script>
@endsection
