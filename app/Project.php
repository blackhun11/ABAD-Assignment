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

    public static function getProject($type, $param = NULL)
    {

        if (!Auth::check()) {
            $userID = 0;
        } else {
            $userID = Auth::user()->userID;
        }
        $values = [$userID, $type, $param];
        return DB::select('EXEC getProject ?,?,?', $values );
    }

    public static function searchProject($search)
    {
        return DB::select('EXEC searchProject '. $search .' ');
    }

    public static function getProjectDetailperProject($projectID, $type)
    {
        $values = [$projectID, $type];
        return DB::select('EXEC getProjectDetailperProject ?,?', $values);
    }

    public static function saveBiddingTransaction($projectID, $userID, $biddingShortMessage, $biddingAmmount)
    {
        $values = [$projectID, $userID, $biddingShortMessage, $biddingAmmount];
        return DB::select('EXEC saveBiddingTransaction ?,?,?,?', $values);
    }

    public static function updateIsWinner($projectID, $userID)
    {
        $values = [$projectID, $userID];
        return DB::select('EXEC updateIsWinner ?,?', $values);
    }

    public static function getMyProjectandBid($userID, $type)
    {
        $values = [$userID, $type];
        return DB::select('EXEC getMyProjectandBid ?,?', $values);
    }

    public static function updateProjectTimeline($projectID, $userID, $status, $progressDesc)
    {
        $values = [$projectID, $userID, $status, $progressDesc];
        return DB::select('EXEC updateProjectTimeline ?,?,?,?   ', $values);
    }

}
