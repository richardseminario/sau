<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ExamResult;

class DashboardController extends Controller
{
    public function admin()
    {

        return view('admin.dashboard');
    }

    public function index()
    {
        return view('dashboard');
    }
}

