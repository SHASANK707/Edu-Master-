@extends('index')

@section('content')

    <!-- <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('student.form') }}" class="btn btn-dark">ADD</a>
        </div>
    </div> -->
    <div>
        @if(session('success'))
            <div class="alert alert-success">
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
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

@endsection
