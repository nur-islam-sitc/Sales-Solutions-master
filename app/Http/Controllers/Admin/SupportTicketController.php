<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportTicketStoreRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


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
        $staffs = User::query()->where('role', 'staff')->get();
        $merchants = User::query()->where('role', 'merchant')->get();
        return view('panel.support_ticket.create', compact('staffs', 'merchants'));
    }

    public function store(SupportTicketStoreRequest $request)
    {

    }
}
