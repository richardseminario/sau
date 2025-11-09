<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ExamResult;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::count();
        $exams = ExamResult::count();
        $average = ExamResult::average('score');

        return view('admin.dashboard', compact('users', 'exams', 'average'));
    }

    public function index()
    {
        return view('dashboard');
    }
}

