<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Log;

use App\User;

use App\Http\Requests;

use DB;

class LogController extends Controller
{
    private function findUserIDByBusinessName($businessName)
    {
        $userID = 0;
        $users = User::where('business', 'LIKE' , '%' . $businessName . '%')->get();
        
        /*$user = DB::table('users')
                      ->whereRaw('business = "' . $businessName . '"')->get();*/
        
        foreach($users as $user) {
            $userID = $user->user_id;
        }
        
        return $userID;
    }
    
    public function store(Request $request)
    {
        $response = array('created' => true);
        $userID = $this->findUserIDByBusinessName('prueba');
        
        if ($userID > 0){
            $log = new Log();
            $log->type_log = $request->typeLog;
            $log->title = $request->title;
            $log->description = $request->description;
            $log->user_id = $userID;
            $log->save();
            
            $response = array('created' => true);
        }
        
        return response()->json($response);
    }
}
