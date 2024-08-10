@extends('index')
@section('content')
    <!-- <a class="button" href="{{ URL::to('parent') }}">Add parent</a> -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ URL::to('parent') }}" class="btn btn-dark">ADD</a>
        </div>
    </div>

    @if (session('success'))
<div class="alert alert-success" id="success-message">
    {{ session('success') }}
</div>
@endif
    <table>
        <thead>
            <tr>
                <th>Parent ID</th>
                <th>Parent Name</th>
                <th>Contact Number</th>
                <th>Parent Email</th>
                <th>Address</th>
                <th>Student ID</th>
                <th>Relationship to Student</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parents as $item)
            @if($item->institute_id == Auth::user()->institute_id)
            <tr>
                <td>{{ $item->parent_id }}</td>
                <td>{{ $item->parent_name }}</td>
                <td>{{ $item->contact_number }}</td>
                <td>{{ $item->parent_email }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->student_id }}</td>
                <td>{{ $item->relationship_to_student }}</td>
                <td><a href="{{ URL::to('parent/deleteRecord/'.$item->parent_id) }}" onclick="return confirmDelete()">Delete</a></td>
                <td><a href="{{ URL::to('parent/updateRecord/'.$item->parent_id) }}">Edit</a></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }

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