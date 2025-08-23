<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function markCompleted($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->update(['is_completed' => true]);

        return redirect()->back()->with('success', 'Tugas berhasil ditandai sebagai selesai!');
    }

    public function updateScore(Request $request, $id)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:100'
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->update(['score' => $request->score]);

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui!');
    }
}