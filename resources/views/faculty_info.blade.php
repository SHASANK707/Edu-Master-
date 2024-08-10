@extends('index')

@section('title', 'Faculty Info Form')

@section('content')
    <h2 class="form-title">Faculty Form</h2>
    <a href="{{ URL::to('faculty/show') }}"  style="display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #007bff; border: none; border-radius: 5px; text-align: center; text-decoration: none; cursor: pointer; transition: background-color 0.3s; margin-bottom: 10px;"
    onmouseover="this.style.backgroundColor='#000';"
    onmouseout="this.style.backgroundColor='#007bff';"> Show Faculty Info </a>
    @if (session('success'))
    <div class="alert alert-success" id="success-message" >
        {{ session('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('faculty.store') }}">
        @csrf
        <div class="form-group">
            <label for="faculty_name">Faculty Name</label>
            <input type="text" class="form-control" id="faculty_name" value="{{ old('faculty_name')}}" name="faculty_name" placeholder="Enter Faculty Name" required>
            @error('faculty_name')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <!-- <div class="form-group">
            <label for="faculty_age">Faculty Age</label>
            <input type="number" class="form-control" id="faculty_age" value="{{old('faculty_age')}}" name="faculty_age" min="18" placeholder="Enter Faculty Age" required>
            <span id="age_feedback" style="color: red;"></span>
            @error('faculty_age')
            <div class="error">{{ $message }} </div>
            @enderror
        </div> -->
        <div class="form-group">
            <label for="faculty_dob">Faculty Date of Birth</label>
            <input type="date" class="form-control" id="faculty_dob" value="{{old('faculty_dob')}}" name="faculty_dob" placeholder="Enter DOB" required>
            <span id="dob_feedback" style="color: red;"></span>
            @error('faculty_dob')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_gender">Faculty Gender</label>
            <select name="faculty_gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="Male" {{ old('faculty_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('faculty_gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('faculty_gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="faculty_contact">Faculty Contact No</label>
            <input type="tel" class="form-control" id="faculty_contact" name="faculty_contact" maxlength="10" value="{{old('faculty_contact')}}" maxlength="10" placeholder="Enter Faculty Contact No" required>
            <span id="phone_feedback" style="color: red;"></span>
            @error('faculty_contact')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_address">Faculty Address</label>
            <textarea class="form-control" id="faculty_address" name="faculty_address" rows="3" placeholder="Enter Address" required>{{ old('faculty_address') }}</textarea>
            @error('faculty_address')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_email">Faculty Email Address</label>
            <input type="email" class="form-control"  id="faculty_email" name="faculty_email" value="{{old('faculty_email')}}" placeholder="Enter Email Address" required>
            @error('faculty_email')
            <div style="color: red" class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            @error('password')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_qualification">Faculty Qualification</label>
            <input type="text" class="form-control" id="faculty_qualification" name="faculty_qualification" value="{{old('faculty_qualification')}}" placeholder="Enter Faculty Qualification" required>
            @error('faculty_qualification')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_doj">Faculty Date of Joining</label>
            <input type="date" class="form-control" id="faculty_doj" name="faculty_doj" value="{{old('faculty_doj')}}" required>
            @error('faculty_doj')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_specializations">Faculty Specialization</label>
            <input type="text" class="form-control" id="faculty_specializations" name="faculty_specializations" value="{{old('faculty_specializations')}}" placeholder="Enter Faculty Specialization" required>
            @error('faculty_specializations')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_experience">Faculty Experience</label>
            <textarea class="form-control" id="faculty_experience" name="faculty_experience" rows="3" placeholder="Enter Experience" required>{{ old('faculty_experience') }}</textarea>
            @error('faculty_experience')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_designation">Faculty Designation</label>
            <input type="text" class="form-control" id="faculty_designation" name="faculty_designation" value="{{old('faculty_designation')}}" placeholder="Enter Faculty Designation" required>
            @error('faculty_designation')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faculty_department">Faculty Department</label>
            <input type="text" class="form-control" id="faculty_department" name="faculty_department" value="{{old('faculty_department')}}" placeholder="Enter Faculty Department" required>
            @error('faculty_department')
            <div class="error">{{ $message }} </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="save">Submit</button>
    </form>
    <script>
       document.getElementById('faculty_dob').addEventListener('input', function() {
    var dobInput = document.getElementById('faculty_dob');
    var dobFeedback = document.getElementById('dob_feedback');
    var dob = new Date(dobInput.value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
        age--;
    }

    if (age < 18) {
        dobFeedback.textContent = 'You must be at least 18 years old.';
        dobInput.setCustomValidity('You must be at least 18 years old.'); // Prevent form submission

        
    } else {
        dobFeedback.textContent = '';
        dobInput.setCustomValidity(''); // Allow form submission
    }
});
        function validateAge() {
            var ageInput = document.getElementById('faculty_age');
            var ageFeedback = document.getElementById('age_feedback');
            var age = parseInt(ageInput.value, 10);
            if (isNaN(age) || age < 18) {
                ageFeedback.textContent = 'Faculty must be at least 18 years old.';
                return false;
            } else {
                ageFeedback.textContent = '';
                return true;
            }
        }
        document.getElementById('faculty_contact').addEventListener('input', function() {
            var phoneInput = document.getElementById('faculty_contact');
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

        
        function validateDate() {
            const dateField = document.getElementById('faculty_doj');
            const selectedDate = new Date(dateField.value);
            const today = new Date();
            
            // Set time to midnight for accurate comparison
            today.setHours(0, 0, 0, 0);

            if (selectedDate < today) {
                alert('Date of joining cannot be in the past.');
                return false;
            }
            return true;
        }

        window.onload = function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('faculty_doj').setAttribute('min', today);
        };

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
