<!-- resources/views/institute_registration.blade.php -->
@extends('index')

@section('title', 'Institute Registration')

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
    top: 25px; /* Adjust based on your header's height */
    left: 80px; /* Adjust based on your container's padding */
    border-radius: 5px;
    cursor: pointer;
  }
</style>
@endsection

@section('content')
  <a href="{{ URL::to('/institute/instituteshow') }}" class="btn btn-secondary btn-back">Back</a>
  <div class="container">
    <form action="{{ URL::to('institute/insert_institute') }}" method="post" class="needs-validation" novalidate>
      <h2 class="text-center mb-4">Institute Registration</h2>
      @csrf
      {{-- <div class="form-group">
        <label for="username">Institute ID</label>
        <input type="text" id="institute_id" value="{{ old('institute_id') }}" name="institute_id" class="form-control" required placeholder="Enter Institute ID">
        <span style="color: red">@error('institute_id'){{ $message }} @enderror</span>
      </div> --}}
      <div class="form-group">
        <label for="institute_name">Institute Name</label>
        <input type="text" id="institute_name" value="{{ old('institute_name') }}" name="institute_name" class="form-control" required placeholder="Enter institute name">
        <span style="color: red">@error('institute_name'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please enter an institute name.
        </div>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" required placeholder="Enter address">
        <span style="color: red">@error('address'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please add an address.
        </div>
      </div>
      <div class="form-group">
        <label for="contact">Contact</label>
        <input type="text" id="contact" value="{{ old('contact') }}" name="contact" class="form-control" maxlength="10" placeholder="Enter contact number">
        <span style="color: red">@error('contact'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please add a valid contact number.
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required placeholder="Enter email">
        <span style="color: red">@error('email'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please enter a valid email address.
        </div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" required placeholder="Enter password">
        <span style="color: red">@error('password'){{ $message }} @enderror</span>
        <div class="invalid-feedback">
          Please enter a valid password.
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
  </div>
@endsection

@section('scripts')
<script>
  (function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
  })();
</script>
@endsection
