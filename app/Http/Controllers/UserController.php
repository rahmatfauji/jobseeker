<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Detail_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::with('detail_users')->get();
        return view('admin.manage_user', compact('user'));  
    }

    public function me()
    {
        $user_active=Auth::user()->id;
        $user= User::findorfail($user_active);
        return view('user.profile', compact('user'));    
    }

    public function editme()
    {
        $user_active=Auth::user()->id;
        $user= User::findorfail($user_active);

        if($user->detail_users->gender=="M"){
            $m="selected";
            $f="";
        }elseif($user->detail_users->gender=="F"){
            $m="";
            $f="selected";
        }else{
            $m="";
            $f="";
        }
        return view('user.edit_profile', compact('user','m','f'));    
    }

    public function updateme(Request $request)
    {
        $user_active=Auth::user()->id;
        $user= User::find($user_active);
        $detail= Detail_user::where('user_id',$user_active)->first();

        $file = $request->file('filecv');
        $destionation_path = 'documents/';
        

    
        DB::beginTransaction();
        try{
        
        if($request->hasFile('filecv')){
            $filename = str_random(6).$file->getClientOriginalName();
            @File::delete($detail->filecv);
            $file->move($destionation_path, $filename);
            $detail->filecv=$destionation_path.$filename;
        }

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        $detail->birth=$request->birth;
        $detail->address=$request->address;
        $detail->city=$request->city;
        $detail->gender=$request->gender;
        $detail->mobilephone=$request->mobilephone;
        $detail->educational=$request->educational;
        
        $detail->save();

        }catch(\Exception $e){
            DB::rollback();
            Session::flash("danger", "User update failed");
            return redirect()->back();
        }
        DB::commit();
        Session::flash("success", "User update success");
        return redirect('profile');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('admin.detail_user', compact('user')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
