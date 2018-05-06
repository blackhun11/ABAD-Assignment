<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Project 
{   
    public static function getAllJobDDLquery()
    {
        return DB::select('EXEC getAllJobDDL');
    }

    public static function getAllPropertyKindDDLquery()
    {
        return DB::select('EXEC getAllPropertyKindDDL');
    }

    public static function saveProject($projectTitle, $job, $kind, $postalCode,
    $minBudget, $maxBudget, $projectStart, $projectEnd, $openBidDate, $closedBidDate, $isMaterial, 
    $projectDesc, $projectPaths, $userID)
    {
        $values = [$projectTitle, $job, $kind, $postalCode, $minBudget, $maxBudget, 
                   $projectStart, $projectEnd, $openBidDate, $closedBidDate, 
                   $isMaterial, $projectDesc, $projectPaths, $userID];
    
        return DB::select('EXEC saveProject ?,?,?,?,?,?,?,?,?,?,?,?,?,?', $values);    
    }

    public static function getProject($type, $kind = NULL)
    {
        $userID = Auth::user()->userID;
        $values = [$userID, $type, $kind];
        return DB::select('EXEC getProject ?,?,?', $values );
    }

    public static function searchProject($search)
    {
        return DB::select('EXEC searchProject '. $search .' ');
    }

}
