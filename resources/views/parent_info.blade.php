@extends('index')

@section('title', 'Parents Page')

@section('content')
@if (session('success'))
<div class="alert alert-success" id="success-message">
    {{ session('success') }}
</div>
@endif
<h1>Parents Page</h1>
<!-- <div class="container">
        <a class="button" href="{{ URL::to('parent/show') }}">Show Parent Info</a>
    </div> -->
<div class="row justify-content-center mt-4">
    <div class="col-md-10 d-flex justify-content-end">
        <a href="{{ URL::to('parent/show') }}" class="btn btn-dark">Show Parent</a>
    </div>
</div>

<form id="parentForm" action="{{ URL::to('parent/insertRecord') }}" method="POST">
    @csrf
    <!-- <div class="form-group">
            <label for="parent_id">Parent ID:</label>
            <input type="text" name="parent_id" id="parent_id" placeholder="Enter ID" required />
            @error('parent_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div> -->
    <div class="form-group">
        <label for="class_name">Student ID</label>
        <select name="student_id" class="form-control" required>
            <option value="">Select Student id</option>
            @foreach($classes as $student_id => $student_name)
            <option value="{{ $student_id }}">{{ $student_id }}</option>
            @endforeach
        </select>
        <span class="text-danger">@error('class_id') {{$message}} @enderror</span>
    </div>
    <div class="form-group">
        <label for="parent_name">Parent Name:</label>
        <input type="text" name="parent_name" id="parent_name" placeholder="Enter Name" required />
        @error('parent_name')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="contact_number">Contact Number:</label>
        <input type="text" maxlength="10" name="contact_number" id="contact_number" placeholder="Enter Contact Number" required />
        <span id="phone_feedback" style="color: red;"></span>
        @error('contact_number')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="parent_email">Email:</label>
        <input type="text" name="parent_email" id="parent_email" placeholder="Enter Email" required />
        @error('parent_email')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" minlength="5" id="password" placeholder="password" required />
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <!-- <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="password" required />
        </div> -->
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" placeholder="Enter Address" required />
        @error('address')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="relationship_to_student">Relation:</label>
        <input type="text" name="relationship_to_student" id="relationship_to_student" placeholder="F/M/G" required />
        @error('relationship_to_student')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <input type="submit" name="save" value="Save Record" onclick="return confirmSubmit()" />
</form>
<!-- <a class="button" href="{{ URL::to('/form') }}">Back</a> -->
<div class="row justify-content-center mt-4">
    <div class="col-md-10 d-flex justify-content-end">
        <a href="{{ URL::to('/form') }}" class="btn btn-dark">Back</a>
    </div>
</div>

<script>
    function confirmSubmit() {
        return confirm('Are you sure you want to submit this form?');
    }
    document.getElementById('contact_number').addEventListener('input', function() {
        var phoneInput = document.getElementById('contact_number');
        var phoneFeedback = document.getElementById('phone_feedback');
        var phone = phoneInput.value;
        // Allow only digits
        if (/^\d*$/.test(phone)) {
            phoneFeedback.textContent = '';
        } else {
            phoneFeedback.textContent = 'Please enter only digits.';
            phoneInput.value = phone.replace(/\D/g, ''); // Remove non-numeric characters
        }
    });

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

@push('styles')
<style>
    body {
        background-color: #E4E9F7;
        color: #333;
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #4070F4;
        text-align: center;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 20px auto;
    }

    input[type="text"],
    input[type="submit"] {
        width: 95%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4070F4;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3357C4;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
    }

    th {
        background-color: #4070F4;
        color: #fff;
    }

    td {
        background-color: #fff;
    }

    a {
        color: #4070F4;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .container {
        position: absolute;
        right: 30px;
        background-color: #4070F4;
        padding: 0px;
        border-radius: 9px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 18%;
        margin: 10px 0;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #4070F4;
        /* Button background color */
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #3050C4;
        /* Button hover color */
    }

    .error {
        color: red;
        font-size: 12px;
        margin-top: -10px;
        margin-bottom: 10px;
    }
</style>
@endpush

