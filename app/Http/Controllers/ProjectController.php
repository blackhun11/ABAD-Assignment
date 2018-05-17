<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $jobDDL = Project::getAllJobDDLquery();
        $propertyKindDDL = Project::getAllPropertyKindDDLquery();
        return view('mainView.createProject', compact('jobDDL', 'propertyKindDDL'));
    }
    
    public function store(Request $request)
    {    
        $projectTitle = $request->projectTitle;
        $job = implode(';',$request->job);
        $kind = $request->kind;
        $postalCode = $request->postalCode;
        $minBudget = $request->minBudget;
        $maxBudget = $request->maxBudget;
        $projectStart = $request->projectStart;
        $projectEnd = $request->projectEnd;
        $openBidDate = $request->openBidDate;
        $closedBidDate = $request->closedBidDate;
        $isMaterial = $request->isMaterial;
        $projectDesc = $request->projectDesc;
        $userID = Auth::user()->userID;
        $path = 'storage/upload/'.$userID."/".$projectTitle.'';
        $projectPath = array();

        
        foreach ($request->input4 as $file ) {
            $fileName = $file->getClientOriginalName();
            $filesize = $file->getClientSize();
            $file->storeAs('public/upload/'.$userID."/".$projectTitle.'',  $fileName);
            array_push($projectPath, array(
                                           "originalName"=>$file->getClientOriginalName(), 
                                           "fileSize"=>$file->getClientSize(),
                                           "uploadPath"=>$path."/".$fileName,
                                           "downloadPath"=>$path."/".$fileName,
                                           "created_at"=>Carbon::now('Etc/GMT-7'),
            ));
            
        }

        $projectPaths = json_encode($projectPath);

        $Return = Project::saveProject($projectTitle, $job, $kind, $postalCode, $minBudget, 
                             $maxBudget, $projectStart, $projectEnd, $openBidDate, 
                             $closedBidDate, $isMaterial, $projectDesc, $projectPaths, $userID);

        foreach ($Return as $Returns) {
           $Status =  $Returns -> Status;
           $Message = $Returns -> Message;
        }

        if ($Status == 1) {
            $request->session()->flash('success', $Message);
            return redirect('createProject');
        }else {
            $request->session()->flash('warning', 'Error to Create the Project');
            return redirect('createProject');
        }        
    }

}
