<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller

    {
        public function index()
        {
            $students = Student::all();
            return view('students.index', compact('students'));
        }
    
        public function create()
        {
            return view('students.create');
        }
    
        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                'age' => 'required|numeric',
                'date_of_birth' => 'required|date',
                'class' => 'required',
                'div' => 'required',
                'guardian_name' => 'required',
                'address' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $input = $request->all();
    
            // Upload Image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $input['image'] = $imageName;
            }
    
            Student::create($input);
    
            return redirect()->route('students.index')
                ->with('success', 'Student created successfully');
        }
    
        public function show($id)
        {
            $student = Student::find($id);
            return view('students.show', compact('student'));
        }
    
        public function edit($id)
        {
            $student = Student::find($id);
            return view('students.edit', compact('student'));
        }
    
        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' => 'required',
                'age' => 'required|numeric',
                'date_of_birth' => 'required|date',
                'class' => 'required',
                'div' => 'required',
                'guardian_name' => 'required',
                'address' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $input = $request->all();
    
            // Upload Image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $input['image'] = $imageName;
            }
    
            $student = Student::find($id);
            $student->update($input);
    
            return redirect()->route('students.index')
                ->with('success', 'Student updated successfully');
        }
    
        public function destroy($id)
        {
            $student = Student::find($id);
            $student->delete();
    
            return redirect()->route('students.index')
                ->with('success', 'Student deleted successfully');
        }
    }
