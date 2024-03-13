<!-- resources/views/students/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Student Details</h1>

        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $student->id }}</li>
            <li class="list-group-item"><strong>Name:</strong> {{ $student->name }}</li>
            <li class="list-group-item"><strong>Age:</strong> {{ $student->age }}</li>
            <li class="list-group-item"><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</li>
            <li class="list-group-item"><strong>Class:</strong> {{ $student->class }}</li>
            <li class="list-group-item"><strong>Division:</strong> {{ $student->div }}</li>
            <li class="list-group-item"><strong>Guardian Name:</strong> {{ $student->guardian_name }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $student->address }}</li>
            <li class="list-group-item">
                <strong>Image:</strong>
                <img src="{{ asset('images/' . $student->image) }}" alt="{{ $student->name }}" class="img-fluid" style="max-width: 100px;">
            </li>
        </ul>

        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
