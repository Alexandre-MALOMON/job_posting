<?php

namespace App\Http\Controllers;

use App\Jobs\Jobsendmail;
use App\Models\Emploie;
use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EmploieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('job.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprise.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo',
            'secteur' => 'required',
            'responsabilities' => 'required',
            'qualification' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'dure' => 'required',

        ]);

    $user=Auth::user()->id;
    $job = new Emploie();
    $job->user_id = $user;
    $job->title = $request->title;
    if ($request->photo) {
        $file = $request->file('photo');
        $filename=time(). '.' .$file->getClientOriginalExtension();
        $request->photo->move('storage/job/', $filename);
        $job->photo = '/storage/job/'.$filename;
    }
    $job->secteur = $request->secteur;
    $job->responsabilities = $request->responsabilities;
    $job->description = $request->description;
    $job->qualification = $request->qualification;
    $job->salary = $request->salary;
    $job->dure = $request->dure;
    $secteur=$request->secteur;
    $job->save();
    $usersjobs = User::all();
    //dd("ici");
            Jobsendmail::dispatch($job, $usersjobs);
    return redirect()->route('entreprise.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function show(Emploie $job)
    {

        $infoEntrepises = Entreprise::where('user_id',Auth::user()->id )->get();
        return view('entreprise.job.show',compact('job','infoEntrepises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploie $emploie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emploie $emploie)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo',
            'responsabilities' => 'required',
            'qualification' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'dure' => 'required',

        ]);

        $user=Auth::user()->id;
        $emploie = new Emploie();
        $emploie->user_id = $user;
        $emploie->title = $request->title;
        if ($request->photo) {
            $file = $request->hasFile('photo');
            $filename=time(). '.' .$file->getClientOriginalExtension();
            $request->photo->move('storage/entreprise/', $filename);
            $user->photo = '/storage/entreprise/'.$filename;
        }
        $emploie->responsabilities = $request->responsabilities;
        $emploie->description = $request->description;
        $emploie->qualification = $request->qualification;
        $emploie->salary = $request->salary;
        $emploie->dure = $request->dure;

        $emploie->save();

        return redirect()->route('entreprise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emploie $job)
    {
        if($job){
            if(file_exists(public_path($job->photo))){
                unlink(public_path($job->photo));
            }

            $job->delete();

        }
        return redirect()->route('entreprise.index')
                              ->with('success','Ce emploi$emploie a ??t?? supprim??') ;
    }
}
