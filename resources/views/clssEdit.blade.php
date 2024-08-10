@extends('index')

@section('content')
    <div class="container form-container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Submit Your Details</h2>
                <form id="updateForm" action="{{ route('clss.update') }}" method="POST" onsubmit="return confirmSubmission()">
                    @csrf
                    <div class="form-group">
                        <label for="class_name">Class Name</label>
                        <input type="text" class="form-control" id="class_name" name="class_name" value="{{ $class->class_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="faculty_id">Class Teacher</label>
                        <select class="form-control" id="faculty_id" name="faculty_id" required>
                            <option value="{{$class->faculty_id}}">Select Class Teacher</option>
                            @foreach($facultyNames as $faculty_id => $faculty_name)
                                <option value="{{ $faculty_id || old('$faculty_id') }}">{{ $faculty_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $class->location }}" required>
                    </div>
                    <input type="hidden" name="update_id" value="{{ $class->class_id }}">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmSubmission() {
            return confirm("Are you sure you want to submit these details?");
        }
    </script>
@endsection
