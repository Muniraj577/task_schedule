<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'))->with('id');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $job = new Job();
        $job->name = $request->name;
        $job->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $job->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        $job->save();
        return redirect()->route('jobs.index');
    }

    public function show(Job $job)
    {
        //
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $job = Job::find($id);
        $job->name = $request->name;
        $job->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $job->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        $job->save();
        return redirect()->route('jobs.index');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->back();
    }
}
