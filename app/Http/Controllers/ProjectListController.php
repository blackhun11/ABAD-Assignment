<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Project;

class ProjectListController extends Controller
{


    public function index()
    {

        $viewRecommended = 1;
        $viewJob = 3;
        $recommendedProject = Project::getProject($viewRecommended);
        $jobProject = Project::getProject($viewJob);
        $propertyKind = Project::getAllPropertyKindDDLquery();
        return view('mainView.projectList', compact('recommendedProject','jobProject','propertyKind'));
    }

    public function showLvl2($id, $id2=NULL)
    {   
        $recommendedProject = Project::getProject($id, $id2);
        $param2 = $id2;
        if ($id == 5)
        {
            $propertyKind = $recommendedProject[0]->propertyKindDesc;
            $propertyKindID = $recommendedProject[0]->propertyKindID;
        }else{
            $propertyKind = 0;
            $propertyKindID = 0;
        }
            return view('mainView.projectListDetail', compact('recommendedProject','propertyKind','propertyKindID','param2'));
        
         //dd($propertyKind);
    }

    public function searchProject(Request $request)
    {
        $query = $request->get('query','');        

        $posts = Project::searchProject($query);     

        foreach ($posts as $post)
        {
            $data1[] = $post->projectDesc;
        }   
    echo json_encode($data1);
    }

    public function projectDetail($id)
    {
        $detail = 1;
        $bidTransaction = 3;
        $photo = 2;
        $projectDetail = Project::getProjectDetailperProject($id, $detail);
        $projectBid = Project::getProjectDetailperProject($id, $bidTransaction);
        $projectPhoto = Project::getProjectDetailperProject($id, $photo);
                
        return view('mainView.projectDetail', compact('projectDetail','projectBid','projectPhoto'));
    }

    public function saveBiddingTransaction(Request $request, $id)
    {
        $projectID = $id; 
        $userID = Auth::user()->userID;
        $biddingShortMessage = $request->biddingShortMessage;
        $biddingAmmount = $request->biddingAmmount;

        $Return = Project::saveBiddingTransaction($projectID, $userID, $biddingShortMessage, $biddingAmmount);

        foreach ($Return as $Returns) {
            $Status =  $Returns -> Status;
            $Message = $Returns -> Message;
         }
 
         if ($Status == 1) {
             $request->session()->flash('success', $Message);
             return redirect('projectDetail/'.$projectID);
         }elseif ($Status == 2) {
            $request->session()->flash('info', $Message);
            return redirect('projectDetail/'.$projectID);
         }else {
             $request->session()->flash('danger', 'Error to Create the Project');
             return redirect('projectDetail/'.$projectID);
         }
    }

    public function searchResult(Request $request)
    {
        if($request->search == "" || $request->search == NULL  ){
            $search = "...";
        }else{
        $search = $request->search;
        }
        $type = 6;

        return redirect('projectList'.'/'.$type.'/'.$search);
    }

    public function updateIsWinner(Request $request)
    {
        $projectID = $request->projectID;        
        $userID = $request->userID;

        $Return = Project::updateIsWinner($projectID, $userID);

        foreach ($Return as $Returns) {
            $Status =  $Returns -> Status;
            $Message = $Returns -> Message;
         }
        return $Message;
    }
}
