<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;

use App\User;

use App\Http\Requests;

use DB;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::All();
        $users = User::where('user_type_id', 2)->get();
        
        return view('log.index', ['logs' => $logs, 'users' => $users]);
    }
    
    /**
     * Display a listing of the resource by client id.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClient($identification)
    {
        if ($identification != 0) {
            $logs = Log::where('user_id', $identification)->get();
        } else {
            $logs = Log::all();
        }
        
        return view('log.list', ['logs' => $logs]);
    }
    
    
    private function verifyIfExistsDataFromRequest(Request $request)
    {
        $exists = false;
        
        if (isset($request->businessName) && !empty($request->businessName) &&
            isset($request->typeLog) && !empty($request->typeLog) &&
            isset($request->title) && !empty($request->title) && 
            isset($request->description) && !empty($request->description)) {
            $exists = true;
        }
        
        return $exists;
    }
    
    private function findUserIDByBusinessName($businessName)
    {
        $userID = 0;
        $users = User::where('business', 'LIKE' , '%' . $businessName . '%')->get();
        
        foreach($users as $user) {
            $userID = $user->user_id;
        }
        
        return $userID;
    }
    
    public function store(Request $request)
    {
        $response = array('created' => false);
        
        if ($this->verifyIfExistsDataFromRequest($request)) {
            $userID = $this->findUserIDByBusinessName($request->businessName);
            
            if ($userID > 0){
                $log = new Log();
                $log->type_log = $request->typeLog;
                $log->title = $request->title;
                $log->description = $request->description;
                $log->user_id = $userID;
                $log->save();
                
                $response = array('created' => true);
            }
        }
        
        return response()->json($response);
    }
}
