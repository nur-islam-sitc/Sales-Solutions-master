<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('panel.support_ticket.index');
    }

    public function create()
    {
        return view('panel.support_ticket.create');
    }
}
