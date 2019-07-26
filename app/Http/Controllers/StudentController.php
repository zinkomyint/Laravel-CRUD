<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();

        return view('students.dashboard',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',

        ]);

        // $student = new Student();
        // $student->firstname = $request->firstname;
        // $student->lastname = $request->lastname;
        // $student->gender = $request->gender;
        // $student->country = $request->country;
        // $student->city = $request->city;
        // $student->address = $request->address;

        // $student->save();

        Student::create($request->except('_token'));

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students=Student::findOrfail($id);
        return view('students.show',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students=Student::findOrfail($id);
        return view('students.edit',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($id);die();
        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',

        ]);

        $student = Student::find($id); 

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->gender = $request->gender;
        $student->country = $request->country;
        $student->city = $request->city;
        $student->address = $request->address;
        $student->save();

        // $students = array(
        //     'firstname' => $request->firstname,
        //     'lastname'  => $request->lastname,
        //     'gender' => $request->gender,
        //     'country' => $request->country,
        //     'city' => $request->city,
        //     'address' => $request->address,

        // );
        
        // Student::whereID($id)->update($students);
        return redirect()->route('students.index')->with('success','student successsful updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::findOrfail($id);
        $students -> delete();
        return redirect()->route('students.index')->with('success','student successsfully Deleted');
    }

    public function search(Request $request)
    {
        $students=DB::table('tbl_students')
        ->select('firstname')
        ->select('lastname')
        ->orderBy('Controller','ASC')
        ->get();
        return view('students',compact('students'));
    }
}
