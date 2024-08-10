<!-- resources/views/course.blade.php -->
@extends('index')

@section('title', 'Institute Course')

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
    /* Custom CSS for the dropdown */
    .custom-dropdown {
      width: 100%;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .custom-dropdown:focus {
      color: #495057;
      background-color: #fff;
      border-color: #80BDFF;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .readonly-input {
      background-color: #E9ECEF;
      opacity: 1;
      color: #495057;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
    }
</style>
@endsection

@section('content')
  <button onclick="location.href='{{ URL::to('/course/courseview') }}'" class="btn-back">Back</button>
  <div class="container">
    <form action="{{ URL::to('course/add_course') }}" method="post" class="needs-validation" novalidate onsubmit="return confirmSubmit()">
      <h2 class="text-center mb-4">Course Registration</h2>
      @csrf
      <div class="form-group">
        <label for="institute_id">Institute Name</label>
        <select name="institute_id" id="institute_id" class="custom-dropdown" aria-placeholder="Institute Name  ">
          <option value="" disabled selected>Select Institute Name</option>
          @foreach ($institutes as $data)
              <option value="{{ $data->institute_id }}">{{ $data->institute_name }}</option>
          @endforeach
        </select>
        <span style="color: red">@error('institute_id'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please select an institute Name.
        </div>
      </div>
      {{-- <div class="form-group">
        <label for="username">Course ID</label>
        <input type="integer" id="course_id" name="course_id" value="{{ old('course_id') }}" class="form-control" required>
        <span style="color: red">@error('course_id'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please enter a course ID.
        </div>
      </div> --}}
      {{-- <div class="form-group">
        <label for="user_id">User Name</label>
        <select name="user_id" id="user_id" class="custom-dropdown" aria-placeholder="User ID">
          <option value="" disabled selected>Select User Name</option>
          @foreach ($users as $item)
              <option value="{{ $item->name }}">{{ $item->name }}</option>
          @endforeach
        </select>
        <span style="color: red">@error('user_id'){{ $message }} @enderror</span>
      </div> --}}
      <div class="form-group">
        <label for="course_name">Course Name</label>
        <input type="text" id="course_name" name="course_name" value="{{ old('course_name') }}" class="form-control" required>
        <span style="color: red">@error('course_name'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please enter a course name.
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
  </div>
@endsection

@section('scripts')
<script>
  function confirmSubmit() {
    return confirm('Are you sure you want to submit this form?');
  }
</script>
@endsection
