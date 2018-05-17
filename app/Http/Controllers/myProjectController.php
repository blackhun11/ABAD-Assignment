<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;

class myProjectController extends Controller
{
    public function index()
    {
        $myProjectCounter = 1;
        $myBidCounter = 2;
        $userID = Auth::user()->userID;
        $myProject = Project::getMyProjectandBid($userID,$myProjectCounter);
        $myBid = Project::getMyProjectandBid($userID,$myBidCounter);
        return view('mainView.myProject', compact('myProject','myBid'));
    }

    public function getProjectTimeline($id){

        $projectID = $id;
        $type = 4;
        $projectTimeline = Project::getProjectDetailperProject($projectID,$type);
        // dd($projectID);
        return view('mainView.projectTimeline', compact('projectTimeline','projectID'));
        
    }

    public function updateProjectTimeline(Request $request, $id){
        $projectID = $id;
        $userID = Auth::user()->userID;        
        $status = $request->status;
        $progressDesc = $request->progressDesc;
        $Return = Project::updateProjectTimeline($projectID, $userID, $status, $progressDesc);

        foreach ($Return as $Returns) {
            $Status =  $Returns -> Status;
            $Message = $Returns -> Message;
         }
 
         if ($Status == 1) {
             $request->session()->flash('success', $Message);
             return redirect('projectTimeline/'.$projectID);
         }elseif ($Status == 2) {
            $request->session()->flash('info', $Message);
            return redirect('projectTimeline/'.$projectID);
         }else {
             $request->session()->flash('danger', 'Error to Create the Project');
             return redirect('projectTimeline/'.$projectID);
         }


    }
}
