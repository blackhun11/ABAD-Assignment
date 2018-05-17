<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Project;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controllesr instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $viewRecommended = 1;
        $recommendedProject = Project::getProject($viewRecommended);
        return view('mainView.newHome', compact('recommendedProject'));
    }

}
