<!-- resources/views/students/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Student</h1>

        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" class="form-control" name="age" value="{{ $student->age }}" required>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" value="{{ $student->date_of_birth }}" required>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Class:</label>
                <input type="text" class="form-control" name="class" value="{{ $student->class }}" required>
            </div>

            <div class="mb-3">
                <label for="div" class="form-label">Division:</label>
                <input type="text" class="form-control" name="div" value="{{ $student->div }}" required>
            </div>

            <div class="mb-3">
                <label for="guardian_name" class="form-label">Guardian Name:</label>
                <input type="text" class="form-control" name="guardian_name" value="{{ $student->guardian_name }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" name="address" required>{{ $student->address }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
