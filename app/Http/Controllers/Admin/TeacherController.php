<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('backend.teachers', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:teachers,email',
            'phone'       => 'required|string|max:20',
            'designation' => 'required|string|max:100',
            'department'  => 'required|string|max:100',
            'subject'     => 'required|string|max:100',
            'salary'      => 'required|numeric',
        ]);

        Teacher::create($request->all());

        return redirect()->back()->with('success', 'শিক্ষকের তথ্য সফলভাবে সংরক্ষণ করা হয়েছে!');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->back()->with('success', 'শিক্ষকের তথ্য মুছে ফেলা হয়েছে!');
    }
}