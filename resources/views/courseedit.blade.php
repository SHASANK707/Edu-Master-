@extends('index')
@section('title', 'Edit Course')
@section('css')
<style>
    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;
        position: absolute;
        top: 45px; /* Adjust based on your header's height */
        left: 75px; /* Adjust based on your container's padding */
        border-radius: 5px;
        cursor: pointer;
    }
    body {
        background-color: #F4F4F4;
    }
    .container {
        margin-top: 50px;
    }
    .card {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007BFF;
        color: white;
    }
    .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
    }
    .btn-primary:hover {
        background-color: #0056B3;
        border-color: #0056B3;
    }
</style>
@endsection
@section('content')
<button onclick="location.href='{{ URL::to('/course/courseview') }}'" class="btn-back">Back</button>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Course</h1>
        </div>
        <div class="card-body">
            <form id="editCourseForm" action="{{ URL::to('/course/update') }}" method="POST" onsubmit="return confirmFormSubmission(event)">
                @csrf
                <div class="form-group">
                    <label for="course_id">Course ID:</label>
                    <input type="number" class="form-control" id="course_id" name="course_id" value="{{ $course->course_id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="course_id">Institute Name</label>
                    <input type="text" class="form-control" id="institute_id" name="institute_id" value="{{ $Institute_name = DB::table('institute')->where('institute_id', $course->institute_id)->value('institute_name') }}" readonly>
                </div>
                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
                </div>
                <input type="hidden" name="update_id" value="{{ $course->course_id }}">
                <button type="submit" class="btn btn-primary" id="update-course-btn">Update Course</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmFormSubmission(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        if (confirm("Are you sure you want to update this course?")) {
            document.getElementById("editCourseForm").submit(); // Submit the form if confirmed
        }
    }
</script>
@endsection