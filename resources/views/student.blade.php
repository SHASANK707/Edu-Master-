@extends('index')

@section('title', 'Student Info Add')

@section('page_title', 'Student Info')

@section('content')
<style>
    /* Specific CSS for Student Form */
    .form-row {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
        font-size: 16px;
    }
    .btn-primary {
        background-color: #5cb85c;
        border-color: #4cae4c;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #4cae4c;
        border-color: #398439;
    }
    .btn-primary:focus {
        outline: none;
    }
</style>

<a class="button btn btn-info" href="{{ URL::to('student/view') }}">Show Data</a>

<form action="{{ URL::to('student/store') }}" method="post" onsubmit="return confirmSubmit()">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger" >
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif

    <div class="form-row">
        {{-- <div class="form-group col-md-6">
            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID" value="{{ old('student_id')}}"required>
            <span class="text-danger">@error('student_id') {{$message}} @enderror</span>
        </div> --}}
        <div class="form-group col-md-6">
            <label for="class_id">Class Name</label>
            <select name="class_id" class="form-control" value="{{ old('class_id')}}" required>
    <option value="">Select Class</option>
    @foreach($classes as $class_id => $class_name)
        <option value="{{ $class_id }}">{{ $class_name }}</option>
    @endforeach
</select>
            <span class="text-danger">@error('class_id') {{$message}} @enderror</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" class="form-control" placeholder="Enter Student Name" value="{{ old('student_name')}}" required>
            <span class="text-danger">@error('student_name') {{$message}} @enderror</span>
        </div>
        <div class="form-group col-md-6">
            <label for="dob">DOB</label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob')}}"  required>
            <span id="dob_feedback" style="color: red;"></span>
            <span class="text-danger">@error('dob') {{$message}} @enderror</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" value="{{ old('gender')}}" required>
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <span class="text-danger">@error('gender') {{$message}} @enderror</span>
        </div>
        <div class="form-group col-md-6">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address')}}"required>
            <span class="text-danger">@error('address') {{$message}} @enderror</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="parent_guardian_contact_info">Parent/Guardian Contact Info</label>
            <input type="tel" name="parent_guardian_contact_info" id="parent_guardian_contact_info" class="form-control" placeholder="Enter Contact Info" maxlength="10" value="{{ old('parent_guardian_contact_info')}}" required>
            <span id="phone_feedback" style="color: red;"></span>
            <span class="text-danger">@error('parent_guardian_contact_info') {{$message}} @enderror</span>
        </div>
        <div class="form-group col-md-6">
            <label for="other_contact">Other Contact</label>
            <input type="tel" name="other_contact" id="other_contact" class="form-control" placeholder="Enter Other Contact" maxlength="10" value="{{ old('other_contact')}}" required >
            <span id="phone_feedback" style="color: red;"></span>
            <span class="text-danger">@error('other_contact') {{$message}} @enderror</span>
        </div>
    </div>

    <div class="form-group">
        <label for="email_address">Email</label>
        <input type="email" name="email_address" class="form-control" placeholder="Enter Email" value="{{ old('email_address')}}" required>
        <span class="text-danger">@error('email_address') {{$message}} @enderror</span>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password" value="{{ old('password')}}" required>
        <span class="text-danger">@error('password') {{$message}} @enderror</span>
    </div>

    <button type="submit" class="btn-primary" name="save">Submit</button>
</form>

<script>
    function confirmSubmit() {
        return confirm('Are you sure you want to submit this form?');
    }
    document.getElementById('dob').addEventListener('input', function() {
            var dobInput = document.getElementById('dob');
            var dobFeedback = document.getElementById('dob_feedback');
            var dob = new Date(dobInput.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 6) {
                dobFeedback.textContent = 'You must be at least 6 years old.';
            } else {
                dobFeedback.textContent = '';
            }
        });
        document.getElementById('parent_guardian_contact_info').addEventListener('input', function() {
            var phoneInput = document.getElementById('parent_guardian_contact_info');
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
        document.getElementById('other_contact').addEventListener('input', function() {
            var phoneInput = document.getElementById('other_contact');
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
                }, 2000); 
            }
        });
       
       
    
</script>
@endsection
