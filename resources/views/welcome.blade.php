@extends('index')
@section('content')
<div class="container-fluid">
    <div id="info-display">
        <h2>Welcome to the {{ Auth::user()->name }} Dashboard</h2>
        <p>Select an option from the sidebar to view information.</p>
    </div>

    <style>
        .box {
            border-radius: 16px;
            /* Rounds the corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            /* Adjust padding as needed */
            transition: background-color 0.3s ease;
            /* Smooth background color transition */
        }

        .box h3 {
            margin: 0;
        }

        .box p {
            font-size: 2rem;
            margin: 0;
        }

        .box.bg-custom {
            background: linear-gradient(45deg, #000273, #22016E, #450075, #6A0068);
            /* Set the background color for both boxes */
        }
    </style>

    @if(Auth::user()->role == 'Management')
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="box bg-custom text-white text-center p-4">
                        <h3>Total Students</h3>
                        <p id="total-entities-count">{{$rowCount1}}</p> <!-- Replace 123 with dynamic data if needed -->
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="box bg-custom text-white text-center p-4">
                        <h3>Total Faculty</h3>
                        <p id="another-metric-count">{{$rowCount2}}</p> <!-- Replace 456 with dynamic data if needed -->
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection