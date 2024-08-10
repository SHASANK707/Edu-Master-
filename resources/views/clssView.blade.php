@extends('index')
    
@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('clss.form') }}" class="btn btn-dark">ADD</a>
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
                <th>Class Name</th>
                <th>Class Teacher</th>
                <th>Location </th>
                <th>Delete</th>
                <th>Edit</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($class as $member)
                <tr>
                    
                    <td>{{ $member->class_name }}</td>
                    <td>{{ $faculty_name = DB::table('faculty_info')->where('faculty_id', $member->faculty_id)->value('faculty_name')  }}</td>
                    <td>{{ $member->location }}</td>
                    <td><a href="{{URL::to('clss/delete/'.$member->class_id)}}" onclick="return confirmDelete()">
                        <button>Delete</button></a></td>
                    <td><a href="{{URL::to('clss/edit/'.$member->class_id)}}"><button>Edit</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }

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