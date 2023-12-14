<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::select('students.*', 'class_name', 'roll_no', 'reg_no', 'result')
        ->join('class_infos', 'student_id', 'students.id')
        ->paginate(25);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $form_data = $request->validated();
        

        if($request->hasfile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $form_data['image'] = $fileName;
        }

        
        Student::create($form_data);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $initialData = $this->initialData();
        $student = Student::select('students.*', 'class_name', 'roll_no', 'reg_no', 'result')
        ->join('class_infos', 'student_id', 'students.id')
        ->where('students.id', $student->id)
        ->first();

        return view('student.edit', compact('student', 'initialData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $form_data = $request->validated();

        if($request->hasfile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $form_data['image'] = $fileName;
        }

        $student_data = collect($form_data)->except('class_name', 'roll_no', 'reg_no', 'result')->toArray();
        $class_data = collect($form_data)->except('name', 'email', 'date_of_birth', 'gender', 'image')->toArray();
        DB::transaction(function () use($student, $student_data, $class_data) {
            Student::whereid($student->id)->update($student_data);
            ClassInfo::whereStudentId($student->id)->update($class_data);
        });
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::whereid($student->id)->delete();
        return back();
    }

    private function initialData() {
        $clses = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
        $results = ['A+', 'A', 'A-', 'B', 'C', 'D', 'F'];
        return [
            'clses' => $clses,
            'results' => $results
        ];
    }
}
