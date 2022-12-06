<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    //
    public function handleLogin(Request $req)
    {
        if (Auth::guard('web_company')->attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect('/company');
        }

        return redirect()->back()->withErrors('Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('web_company')->logout();
        return redirect('/company/login');
    }

    public function index()
    {
        $jobs = Auth::guard('web_company')->user()->jobs;
        return view('company.index', [
            'title' => 'Company Dashboard',
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('company.create', [
            'title' => 'Create Job'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'working_hours' => 'required',
        ]);
        $validated['company_id'] = Auth::guard('web_company')->user()->id;
        Jobs::create($validated);
        return redirect('/company')->with('success', 'Job Created Successfully');
    }

    public function delete($id)
    {
        $job = Jobs::find($id);
        $job->delete();
        return redirect('/company')->with('success', 'Job Deleted Successfully');
    }

    public function edit($id)
    {
        $job = Jobs::find($id);
        return view('company.edit', [
            'title' => 'Edit Job',
            'job' => $job
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'working_hours' => 'required',
        ]);
        $job = Jobs::find($id);
        $job->update($validated);
        return redirect('/company')->with('success', 'Job Updated Successfully');
    }
}
