<?php

namespace App\Http\Controllers;

use Auth;

use App\Facades\DropboxFacade;

use App\User;

use App\UserType;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
use Alorel\Dropbox\Options\Builder\ListFolderOptions;

class BackupController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @param Request $request params for HTTP
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['link' => 'copias']);
        $users = collect([User::find(Auth::user()->user_id)]);
        
        if($users != null){
            return view('backup.index', ['files' => $this->_getCopies($users)]);
        } else {
            echo __('backup.error.user_not_found');
        }
    }

    /**
     * Show copies from all users
     * 
     * @return view
     * */
    public function showAllCopies() {
        session(['link' => 'copias']);
        $users = User::where('user_type_id','=', UserType::clientUser())->get();
        
        if ($users != null) {
            return view('backup.index', ['files' => $this->_getCopies($users)]);
        } else {
            echo __('backup.information.not_users_show');
        }
    }
    
    /**
     * Get list of copies from the user(s)
     * 
     * @param Collection $users
     * @return array $files
     */
    private function _getCopies($users) {
        $files = array();

        foreach ($users as $user) {
            array_push($files, ["user" => $user,
                                "files" => DropboxFacade::listDirectory($user->business)]);
        }
        
        return $files;
    }
    
    /**
     * Download file from dropbox storage
     * 
     * @param Request $request params for HTTP
     * @return void
     */
    public function downloadFile(Request $request) {
        return redirect(DropboxFacade::download($request->business . '/' . $request->name));
    }

    /**
     * Delete file
     * 
     * @param Request $request params for HTTP
     * @return \Illuminate\Http\Response
     */
    public function deleteFile(Request $request) {
        if (DropboxFacade::delete($request->business . '/' . $request->name)) {
            if (Auth::user()->user_type_id == UserType::clientUser()) {
                return redirect()->action('BackupController@showAllCopies');
            } else {
                return redirect()->action('BackupController@index');
            }
        }
    }
}
