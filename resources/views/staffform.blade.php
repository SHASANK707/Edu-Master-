@extends('index')

@section('title', 'Add Staff')

@section('page_title', 'Add Staff')

@section('content')
    <div class="form-container">
        <form id="staffForm" action="{{ route('form.insert') }}" method="post">
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

            {{-- @if (session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
            @endif --}}

            <div class="form-group">
                <label for="staff_name">Staff Name:</label>
                <input type="text" id="staff_name" name="staff_name">
                @error('staff_name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                    <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Other</option>
                </select>
                <span class="text-danger">@error('gender') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" maxlength="10">
                <span id="phone_feedback" style="color: red;"></span>
                @error('contact_number')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea>
                @error('address')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation">
                @error('designation')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" id="department" name="department">
                @error('department')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" name="save" value="1">Submit</button>
            </div>
        </form>
    </div>
    <div class="form-group" style="text-align: center;">
        <a href="/staff/form/view" class="button-link" id="viewDataLink">View Data</a>
    </div>

    <script>
        // Confirm before form submission
        document.getElementById('staffForm').addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to submit the form?')) {
                e.preventDefault();
            }
        });

        // Confirm before navigating to view data
        document.getElementById('viewDataLink').addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to view the data?')) {
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

        // document.addEventListener('DOMContentLoaded', function() {
        //     var successMessage = document.getElementById('success-message');
        //     if (successMessage) {
        //         setTimeout(function() {
        //             successMessage.style.display = 'none';
        //         }, 2000); 
        //     }
        // });
        
    </script>
@endsection

@push('styles')
    <style>
        .form-container {
            background-color: #e9f7f9;
            border: 1px solid #cce5e5;
            padding: 20px;
        }

        .form-group label {
            color: #0056b3;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            border-color: #b3d9d9;
        }

        .form-group button[type="submit"] {
            background-color: #17a2b8;
        }

        .form-group button[type="submit"]:hover {
            background-color: #138496;
        }

        .error {
            color: red;
        }
    </style>
@endpush

@push('scripts')

@endpush
