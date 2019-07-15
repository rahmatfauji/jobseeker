<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Job;
use App\Detail_user;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
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
        $user_active=Auth::user()->id;
        $job= Job::orderBy('created_at','asc')->get();

        if($role_active=='admin'){
            return view('admin.manage_job', compact('job'));
        }else{
            //cek apakah profil sudah lengkap/belum
            if(cekProfil($user_active)==true){
                Session::flash('error','Your profile is not completed');
                return redirect('profile');
            }else{
            return view('job.list_job', compact('job'));
            } 
        }
        
    }

    public function publishjobs()
    {
        $job= Job::orderBy('created_at','desc')->paginate(5);        
        return view('guest.list_jobs', compact('job'));
    }

    public function apply($id)
    {
        $user_active=Auth::user()->id;
        $job = Job::findorfail($id);
        foreach($job->users as $user){   
        }
        if(@$user->pivot->user_id <> Auth::user()->id){
        $job->users()->attach($user_active);
            Session::flash("success", "Apply success");
            return redirect('my-applications');
        }else{
            Session::flash("info", "Your applied was sent");
            return redirect('my-applications'); 
        }
        
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
    public function store(JobRequest $request)
    {
        $job= Job::create(
            [
             'name'=>$request->name,
             'salary'=>$request->salary,
             'descriptions'=>$request->descriptions
            ]
        );
        Session::flash('info','Added Job is success');
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
        $username_active=Auth::user()->name;
        $user_active=Auth::user()->id;
        $job= Job::findorfail($id);

        if($username_active=='admin'){
            return view('admin.detail_job', compact('job'));
        }else{
            //cek apakah profil sudah lengkap/belum
            if(cekProfil($user_active)==true){
                Session::flash('error','Your profile is not completed');
                return redirect('profile');
            }else{
            return view('job.detail_job', compact('job'));
            }
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
    public function update(JobRequest $request, $id)
    {
        $job = Job::findorfail($id);
        $job->name=$request->name;
        $job->salary=$request->salary;
        $job->descriptions=$request->descriptions;
        $job->save();
        Session::flash('success','Your Jobs updated success');
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
        DB::beginTransaction();
        try{
        $job->users()->detach();
        $job->delete();
        }catch(\Exception $e){
            DB::rollback();
            Session::flash("error", "User Delete Failed");
            return redirect()->back();
        }
        DB::commit();
        Session::flash('info','this job success deleted');
        return redirect('manage-jobs');
    }
}
