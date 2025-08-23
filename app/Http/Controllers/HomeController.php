<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Assignment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $classrooms = ClassRoom::with([
            'assignments' => function ($query) {
                $query->where('due_date', '>=', now())
                    ->orderBy('due_date', 'asc')
                    ->limit(5);
            }
        ])->get();

        $upcomingAssignments = Assignment::with('classroom')
            ->where('due_date', '>=', now())
            ->where('is_completed', false)
            ->orderBy('due_date', 'asc')
            ->limit(10)
            ->get();

        return view('dashboard', compact('classrooms', 'upcomingAssignments'));
    }
}