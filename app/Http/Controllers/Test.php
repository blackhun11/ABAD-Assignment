<?php

namespace App\Http\Controllers;


use App\Project;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Test extends Controller
{
    
    public function index()
    {
        return view('mainLayout.test');
    }

    public function store(Request $request)
    {
       $test = $request->test;
       dd($request);

        return redirect('mainLayout.test');
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
