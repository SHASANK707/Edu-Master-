@extends('index')

@section('content')

    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('student.form') }}" class="btn btn-dark">ADD</a>
        </div>
    </div>
    <div>
        @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Class Name</th>
                <th>Student Name </th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Parent Contact Number</th>
                <th>Other Contact</th>
                <th>Email</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studnt as $member)
            @if($member->institute_id == Auth::user()->institute_id)
                <tr>
                    <td>{{ $member->student_id }}</td>
                    <td>{{ $class_name = DB::table('class')->where('class_id', $member->class_id)->value('class_name') }}</td>
                    <td>{{ $member->student_name }}</td>
                    <td>{{ $member->dob }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>{{ $member->address }}</td>
                    <td>{{ $member->parent_guardian_contact_info }}</td>
                    <td>{{ $member->other_contact }}</td>
                    <td>{{ $member->email_address }}</td>
                    <td><a href="{{ URL::to('student/delete/'.$member->student_id) }}" onclick="return confirmDelete()">
                        <button>Delete</button></a></td>
                    <td><a href="{{ URL::to('student/edit/'.$member->student_id) }}"><button>Edit</button></a></td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this student?');
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
