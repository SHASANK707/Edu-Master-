<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1> {{$mailData['title']}} </h1>
    <p> {{$mailData['body']}} </p>
    <p>Student Name: {{$mailData['student']['name']}}</p>
    <p>Student ID: {{$mailData['student']['id']}}</p>
    <p>Student Email: {{$mailData['student']['email']}}</p>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, nisi eligendi, illo aperiam nesciunt ducimus ipsa, modi hic vero suscipit neque! Molestiae excepturi rerum accusantium nam omnis, commodi consequuntur aperiam?</p>
    <p>Thank you</p> --}}

    <h1>Welcome to Edu-Master</h1>
    <p>Your account has been created successfully. Here are your login details:</p>
    <p>Email: {{ $mailData['email'] }}</p>
    <p>Password: {{ $mailData['password'] }}</p>
    <p>Please keep this information secure.</p>
    
</body>
</html>