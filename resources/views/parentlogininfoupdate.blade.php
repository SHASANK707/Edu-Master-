@extends('index')

@section('content')
    <div class="container">
        <h1>Edit Details</h1>
        <form id="editForm" action="{{ URL::to('/parentdashboard/update') }}" method="POST">
            @csrf
            <div class="form-group">
            <label for="class_name">Student ID</label>
            <select name="student_id" class="form-control" required>
    <option value="">Select student id</option>
    @foreach($classes as $student_id => $student_name)
        <option value="{{ $student_id }}">{{ $student_id }}</option>
    @endforeach
</select>
</div>
            <div class="form-group">
                <label for="parent_name">Parent Name:</label>
                <input type="text" name="parent_name" class="form-control" value="{{ $parent->parent_name }}" placeholder="Enter name" />
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" maxlength="10" name="contact_number" class="form-control" value="{{ $parent->contact_number }}" placeholder="Enter contact number" />
            </div>
            <div class="form-group">
                <label for="parent_email">Email:</label>
                <input type="text" name="parent_email" class="form-control" value="{{ $parent->parent_email }}" placeholder="Enter email" />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ $parent->address }}" placeholder="Enter address" />
            </div>
            <div class="form-group">
                <label for="relationship_to_student">Relation:</label>
                <input type="text" name="relationship_to_student" class="form-control" value="{{ $parent->relationship_to_student }}" placeholder="F/M/G" />
            </div>
            <input type="hidden" name="update_id" value="{{ $parent->parent_id }}" />
            <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Update Record</button>
        </form>
    </div>

    <script>
        function confirmSubmit() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
@endsection

@section('styles')
    <style>
        body {
            background-color: #E4E9F7;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #4070F4;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
            width: 100%;
        }

        .btn-primary {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4070F4;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #3057c4;
        }
    </style>
@endsection
