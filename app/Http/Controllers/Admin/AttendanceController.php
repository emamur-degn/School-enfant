<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
// use App\Models\Student; // স্টুডেন্ট মডেল থাকলে এটি আনকমেন্ট করবেন

class AttendanceController extends Controller
{
    /**
     * এটেনডেন্স পেজ এবং ফিল্টার লিস্ট দেখানোর জন্য
     */
    public function index(Request $request)
    {
        // ফিল্টার থেকে সিলেক্ট করা তারিখ, না থাকলে আজকের তারিখ
        $selectedDate = $request->input('date', date('Y-m-d'));
        
        // টাইপ: 'teacher' অথবা 'student'
        $type = $request->input('type', 'teacher');

        $records = [];

        if ($type === 'teacher') {
            // টিচারদের তথ্য ডাটাবেজ থেকে নিয়ে আসা
            $records = Teacher::latest()->get();
        } else {
            // $records = Student::latest()->get();
            $records = [];
        }

        return view('backend.attendance', compact('records', 'selectedDate', 'type'));
    }

    /**
     * এটেনডেন্স ডাটাবেজে সেভ করার জন্য
     */
    public function store(Request $request)
    {
        // ইনপুট ভ্যালিডেশন
        $request->validate([
            'date'       => 'required|date',
            'type'       => 'required|string',
            'attendance' => 'required|array',
        ]);

        $date = $request->input('date');
        $type = $request->input('type');
        $attendanceData = $request->input('attendance'); // [id => status]

        /*
        |--------------------------------------------------------------------------
        | ডাটাবেজ সেভ করার লজিক (Attendance Model থাকলে)
        |--------------------------------------------------------------------------
        | foreach ($attendanceData as $personId => $status) {
        |     Attendance::updateOrCreate(
        |         [
        |             'date'    => $date,
        |             'user_id' => $personId,
        |             'type'    => $type,
        |         ],
        |         [
        |             'status'  => $status,
        |         ]
        |     );
        | }
        */

        return redirect()->back()->with('success', 'Attendance saved successfully for ' . $date);
    }
}