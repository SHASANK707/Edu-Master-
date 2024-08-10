@extends('index')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-10 d-flex justify-content-end">
        <a href="{{ route('form.index') }}" class="btn btn-dark">Add</a>
    </div>
</div>
<div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
    </div>
    @endif
</div>

<table>
    <thead>
        <tr>
            <th>Staff ID</th>
            <th>Institute ID</th>
            <th>Staff Name</th>
            <th>Gender</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $member)
            @if($member->institute_id == Auth::user()->institute_id)
            <tr>
                <td>{{ $member->staff_id }}</td>
                <td>{{ $member->institute_id }}</td>
                <td>{{ $member->staff_name }}</td>
                <td>{{$member->gender}}</td>
                <td>{{ $member->contact_number }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->designation }}</td>
                <td>{{ $member->department }}</td>
                <td>
                    <a href="{{ route('form.edit',$member->staff_id) }}" class="btn btn-dark edit-btn">Edit</a>
                    <a href="{{ route('view.destroy',$member->staff_id)}}" class="btn btn-danger delete-btn">Delete</a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>


    <script>
        // Confirm before navigating to edit page
        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to edit this item?')) {
                    e.preventDefault();
                }
            });
        });

        // Confirm before deleting
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to delete this item?')) {
                    e.preventDefault();
                }
            });
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