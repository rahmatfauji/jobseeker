<?php

namespace App\Http\Controllers;
use App\Http\Requests\StatusRequest;
use App\User;
use App\Job;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::has('jobs')->with('jobs')->get();
        
        return view('applicants.manage_applicants', compact('user'));
    }

    public function me()
    {
        $user_active=Auth::user()->id;
        //cek apakah profil sudah lengkap/belum
        if(cekProfil($user_active)==true){
            Session::flash('error','Your profile is not completed');
            return redirect('profile');
        }else{
        $user= User::has('jobs')->with('jobs')->where('id',Auth::user()->id)->get();
        return view('applicants.my_applications', compact('user'));
        }
    }

    public function changeStatus($id,$id2){
        $user= User::where('id',$id)->first();
        $job=$user->jobs()->wherePivot('job_id',$id2)->first();
        if($job->pivot->status=="unread"){
            $u="selected";
            $a="";
            $r="";
        }elseif($job->pivot->status=="accept"){
            $a="selected";
            $u="";
            $r="";
        }elseif($job->pivot->status=="reject"){
            $r="selected";
            $a="";
            $u="";
        }

        return view('applicants.change_status', compact('user','job', 'u','a','r'));
    }


    public function updateStatus(StatusRequest $request){
        // dd($request->all());
        // $job=Job::find($request->job_id);
        // dd($job->users()->updateExistingPivot($request->user_id, ['status'=>$request->status,'message'=>$request->message]));
        $user=User::find($request->user_id);
        if($request->status=="unread"){
            $request->message="unread";
        }
        $user->jobs()->updateExistingPivot($request->job_id, ['status'=>$request->status,'message'=>$request->message]);
        Session::flash("success","Application status succces updated");
        return redirect('manage-applicants');
    }
}
