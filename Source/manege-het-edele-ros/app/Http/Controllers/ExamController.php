<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;
use App\Models\lessen;
use Illuminate\Support\Facades\Route;

class ExamController extends Controller
{
    // show all exams
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    // the create function is used to show the form to create a new examen and get lessons from the database
    public function create(Request $request)
    {
        $lessen = lessen::all();
        return view('exam.create', compact('lessen'));
    }

    // the store function is used to store the new examen in the database
    public function store(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required|string|alpha|max:255',
            'les' => 'required|string|max:255',
            'exam_name' => 'required|string|max:255',
        ]);

        // Create a new exam
        $exam = new exam([
            'name' => $request->name,
            'exam_name' => $request->exam_name,
            'lessen_id' => $request->les
        ]);

        $examen = exam::where('lessen_id', $request->les)->get()->toArray();

        if (!$examen == [])
        {
            return redirect()->route('exam.create')->with('niet gelukt', 'Er stond al een examen in');
        }

        $exam->save();

        return redirect()->route('exam.create')->with('success', 'Exam created successfully.');
    }
}
