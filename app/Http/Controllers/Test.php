<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;


class Test extends Controller
{
    
    public function index()
    {
        return view('mainLayout.test');
    }

    public function store(request $request)
    {

        // if ($request->hasFile('image')) {
        //     $request->file('image');
        //     // return $request->image->extension();
        //     return $request->image->storeAs('public','bitfumes.jpg');
        //     // return Storage::putFile('public',$request->file('image'));
        // }else{
        //     return 'no file selected';
        // }

        return $request->all();
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
