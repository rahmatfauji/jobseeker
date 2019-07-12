<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Auth;
use Session;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_active=Auth::user()->roles()->first()->name;
        $job= Job::all();

        if($role_active=='admin'){
            return view('admin.manage_job', compact('job'));
        }else{
            return view('job.list_job', compact('job')); 
        }
        
    }

    public function apply($id)
    {
        $user_active=Auth::user()->id;
        $job = Job::findorfail($id);
        $job->users()->attach($user_active);
        Session::flash("success", "Apply success");
        return redirect('my-applications');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job= Job::create(
            [
             'name'=>$request->name,
             'salary'=>$request->salary,
             'descriptions'=>$request->descriptions
            ]
        );
        return redirect('manage-jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_active=Auth::user()->name;
        $job= Job::findorfail($id);
        if($user_active=='admin'){
            return view('admin.detail_job', compact('job'));
        }else{
            return view('job.detail_job', compact('job'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job= Job::findorfail($id);
        return view('admin.edit_job', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::findorfail($id);
        $job->name=$request->name;
        $job->salary=$request->salary;
        $job->descriptions=$request->descriptions;
        $job->save();

        return redirect('manage-jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findorfail($id);
        $job->users()->detach();
        $job->delete();
        return redirect('manage-jobs');
    }
}
