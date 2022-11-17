<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('panel.staffs.index');
    }

    public function create()
    {
        return view('panel.staffs.create');
    }
}
