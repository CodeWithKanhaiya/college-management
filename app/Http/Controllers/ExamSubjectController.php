<?php



namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\ExamSubject;
use Illuminate\Http\Request;


class ExamSubjectController extends Controller
{
  public function index()
{
    $examSubjects = ExamSubject::with([
        'exam',
        'subject'
    ])
    ->latest()
    ->get();

    return view(
        'admin.exam_subjects.index',
        compact('examSubjects')
    );
}

public function create()
{
    $exams = Exam::where('status', true)
        ->latest()
        ->get();

    $subjects = Subject::where('status', true)
        ->latest()
        ->get();

    return view(
        'admin.exam_subjects.create',
        compact('exams', 'subjects')
    );
}

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'exam_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'room_no' => 'required|string|max:50',
        ]);

        ExamSubject::create([
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'exam_date' => $request->exam_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'room_no' => $request->room_no,
        ]);

        return redirect()
            ->route('admin.exam-subjects.index')
            ->with('success', 'Exam subject created successfully.');
    }

    public function edit(ExamSubject $examSubject)
    {
        $exams = Exam::where('status', true)
            ->latest()
            ->get();

        $subjects = Subject::where('status', true)
            ->latest()
            ->get();

        return view(
            'admin.exam_subjects.edit',
            compact('examSubject', 'exams', 'subjects')
        );
    }

public function update(Request $request, ExamSubject $examSubject)
{
    $request->validate([
        'exam_id' => 'required|exists:exams,id',
        'subject_id' => 'required|exists:subjects,id',
        'exam_date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
        'room_no' => 'required|string|max:50',
    ]);

    $examSubject->update([
        'exam_id' => $request->exam_id,
        'subject_id' => $request->subject_id,
        'exam_date' => $request->exam_date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'room_no' => $request->room_no,
    ]);

    return redirect()
        ->route('admin.exam-subjects.index')
        ->with('success', 'Exam subject updated successfully.');
}
    public function destroy(ExamSubject $examSubject)
    {
        $examSubject->delete();

        return redirect()
            ->route('admin.exam-subjects.index')
            ->with('success', 'Exam subject deleted successfully.');
    }
}