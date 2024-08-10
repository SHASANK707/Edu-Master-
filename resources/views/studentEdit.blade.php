@extends('index')

@section('content')
<div class="container">
    <h1>Update Student Information</h1>
    <form id="update-form" action="{{ route('student.update') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="class_id">Class Name</label>
                <select name="class_id" class="form-control" required>
                    <option value="">Select Class</option>
                    @foreach($classes as $class_id => $class_name)
                    <option value="{{ $class_id }}" {{ old('class_id', $stored_class_id) == $class_id ? 'selected' : '' }}>
                        {{ $class_name }}
                    </option>
                    @endforeach
                </select>
                <span class="text-danger">@error('class_id') {{$message}} @enderror</span>
            </div>


            <div class="form-group col-md-6">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" class="form-control" value="{{$studnt->student_name}}" aria-describedby="helpId">
                <span class="text-danger">
                    @error('student_name') {{$message}} @enderror
                </span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dob">DOB</label>
                <input type="date" name="dob" class="form-control" value="{{$studnt->dob}}" aria-describedby="helpId">
                <span class="text-danger">
                    @error('dob') {{$message}} @enderror
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control" aria-describedby="helpId">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $studnt->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $studnt->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $studnt->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                <span class="text-danger">
                    @error('gender') {{$message}} @enderror
                </span>

            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{$studnt->address}}" aria-describedby="helpId">
                <span class="text-danger">
                    @error('address') {{$message}} @enderror
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="parent_guardian_contact_info">Parent/Guardian Contact Info</label>
                <input type="tel" name="parent_guardian_contact_info" class="form-control" value="{{$studnt->parent_guardian_contact_info}}" maxlength="10" aria-describedby="helpId">
                <span class="text-danger">
                    @error('parent_guardian_contact_info') {{$message}} @enderror
                </span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="other_contact">Other Contact</label>
                <input type="tel" name="other_contact" class="form-control" value="{{$studnt->other_contact}}" maxlength="10" aria-describedby="helpId">
                <span class="text-danger">
                    @error('other_contact') {{$message}} @enderror
                </span>
            </div>
            <div class="form-group col-md-6">
                <label for="email_address">Email</label>
                <input type="email" name="email_address" class="form-control" value="{{$studnt->email_address}}" aria-describedby="helpId">
                <span class="text-danger">
                    @error('email_address') {{$message}} @enderror
                </span>
            </div>
        </div>

        <input type="hidden" name="update_id" value="{{$studnt->student_id}}">
        <button type="button" class="btn btn-primary" onclick="confirmUpdate()">UPDATE</button>
    </form>
</div>

<script>
    function confirmUpdate() {
        if (confirm('Are you sure you want to update this student information?')) {
            document.getElementById('update-form').submit();
        }
    }
</script>
@endsection