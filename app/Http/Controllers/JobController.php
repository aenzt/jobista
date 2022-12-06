<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Jobs::all();
        return view('explore', [
            'title' => 'Explore Jobs',
            'jobs' => $jobs
        ]);
    }

    public function show($id)
    {
        $job = Jobs::find($id);
        if (Auth::user()) {
            $contain = Auth::user()->jobs->contains($job);
            return view('job', [
                'title' => 'Job Details',
                'job' => $job,
                'contain' => $contain
            ]);
        }
        return view('job', [
            'title' => 'Job Details',
            'job' => $job,
        ]);
    }

    public function show_saved()
    {
        $jobs = Auth::user()->jobs;
        return view('savedjobs', [
            'title' => 'Saved Jobs',
            'jobs' => $jobs
        ]);
    }

    public function show_applied()
    {
        $jobs = Auth::user()->apply_jobs;
        return view('appliedjobs', [
            'title' => 'Applied Jobs',
            'jobs' => $jobs
        ]);
    }

    public function save($id)
    {
        $job = Jobs::find($id);
        Auth::user()->jobs()->syncWithoutDetaching($job);
        return redirect()->back()->with('success', 'Job Saved Successfully');
    }

    public function delete_saved($id)
    {
        $job = Jobs::find($id);
        Auth::user()->jobs()->detach($job);
        return redirect()->back()->with('success', 'Job Deleted Successfully');
    }

    public function apply(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cover_letter' => 'required',
            'resume' => 'required|mimes:pdf|max:5120'
        ]);

        $job = Jobs::find($id);
        if ($request->hasFile('resume')) {
            $imagepath = $request->file('resume')->store('resume');
        } else {
            $imagepath = null;
        }
        Auth::user()->apply_jobs()->syncWithPivotValues($job, ['cover_letter' => $validatedData['cover_letter'], 'resume' => $imagepath], false);
        return redirect()->back()->with('success', 'Job Applied Successfully');
    }

    public function delete_applied($id)
    {
        $job = Jobs::find($id);
        Storage::delete(Auth::user()->apply_jobs()->where('jobs_id', $id)->first()->pivot->resume);
        Auth::user()->apply_jobs()->detach($job);
        return redirect()->back()->with('success', 'Job Deleted Successfully');
    }

    public function applicants($id)
    {
        $job = Jobs::find($id);
        $applicants = $job->apply_jobs;
        return view('company.applicant', [
            'title' => 'Applicants',
            'applicants' => $applicants,
            'job' => $job
        ]);
    }
}
