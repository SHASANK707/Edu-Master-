<!DOCTYPE html>
<!-- Source Codes By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form in HTML and CSS | CodingNepal</title>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
  <div class="login_form">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="input_box">
        <label for="institute_id">Institute ID</label>
        <input type="text" name="institute_id" id="name" placeholder="Enter Institute ID" required>
    </div>
    <div class="input_box">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name" required>
    </div>
    <div class="input_box">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter Email" required>
    </div>
    <div class="input_box">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
    </div>
    <div class="input_box">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
    </div>
    <button type="submit">Register</button>
</form>

  </div>
</body>
</html>