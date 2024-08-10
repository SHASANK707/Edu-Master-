@extends('index')

@section('content')
    <div class="form-container">
        <form id="update-form" action="{{ route('form.update') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="staff_id">Staff ID:</label>
                <input value="{{ old('staff_id', $user->staff_id) }}" type="text" id="staff_id" name="staff_id" required>
                @error('staff_id')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="staff_name">Staff Name:</label>
                <input value="{{ old('staff_name', $user->staff_name) }}" type="text" id="staff_name" name="staff_name" required>
                @error('staff_name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="M" {{ old('gender', $user->gender) == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('gender', $user->gender) == 'F' ? 'selected' : '' }}>Female</option>
                    <option value="O" {{ old('gender', $user->gender) == 'O' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input value="{{ old('contact_number', $user->contact_number) }}" maxlength="10" type="text" id="contact_number" name="contact_number" required>
                <span id="phone_feedback" style="color: red;"></span>
                @error('contact_number')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input value="{{ old('email', $user->email) }}" type="email" id="email" name="email" required>
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required>{{ old('address', $user->address) }}</textarea>
                @error('address')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input value="{{ old('designation', $user->designation) }}" type="text" id="designation" name="designation" required>
                @error('designation')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input value="{{ old('department', $user->department) }}" type="text" id="department" name="department" required>
                @error('department')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hidden input field to store the user ID -->
            <input type="hidden" name="update_id" value="{{ $user->staff_id }}">

            <div class="form-group">
                <button type="submit" name="save">Update</button>
            </div>
        </form>
    </div>

    <div class="form-group" style="text-align: center;">
        <a href="/staff/form/view" class="button-link">View Data</a>
    </div>

    <script>
        document.getElementById('update-form').addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to update this information?')) {
                e.preventDefault();
            }
        });
    
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
    
       
    </script>
@endsection

@section('styles')
    <style>
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
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea,
        .form-group select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
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

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-container {
                width: calc(100% - 40px);
            }
        }
    </style>
   
@endsection

