<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffStoreRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $staffs = User::query()->with('roles')->where('role', User::STAFF)->get();
        return view('panel.staffs.index', compact('staffs', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('panel.staffs.create', compact('roles'));
    }

    public function store(StaffStoreRequest $request)
    {

        $data = $request->validated();
        $data['role'] = User::STAFF;
        $user = User::query()->create($data);

        $user->roles()->attach($request->role);

        return redirect()->route('admin.staffs');
    }

    public function edit(User $staff)
    {
        $roles = Role::all();
        $staff->load('roles');
        return view('panel.staffs.edit', compact('staff', 'roles'));
    }

    public function update(StaffStoreRequest $request, $staff)
    {
        return $request;
    }
}
