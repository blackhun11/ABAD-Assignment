<?php

namespace App\Http\Controllers;

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
        $propertyKind = $recommendedProject[0]->propertyKindDesc;
         //dd($propertyKind);
        return view('mainView.projectListDetail', compact('recommendedProject','propertyKind'));
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
}
