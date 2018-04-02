<?php

namespace App\Http\Controllers;

use Auth;

use App\Facades\DropboxClass;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackupController extends Controller
{
    const CLIENT_USER = 2;
    
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
            echo 'Error: usuario no encontrado';
        }
    }

    /**
     * Show copies from all users
     * 
     * @return view
     * */
    public function showAllCopies() {
        session(['link' => 'copias']);
        $users = User::where('user_type_id','=', self::CLIENT_USER)->get();
        
        if ($users != null) {
            return view('backup.index', ['files' => $this->_getCopies($users)]);
        } else {
            echo 'Información: No hay usuarios por mostrar';
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
                                "files" => DropboxClass::listDirectory($user->business)]);
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
        DropboxClass::download($request->business . '/' . $request->name);
    }

    /**
     * Delete file
     * 
     * @param Request $request params for HTTP
     * @return \Illuminate\Http\Response
     */
    public function deleteFile(Request $request) {
        if (DropboxClass::delete($request->business . '/' . $request->name)) {
            if (Auth::user()->user_type_id == 1) {
                return redirect()->action('BackupController@showAllCopies');
            } else {
                return redirect()->action('BackupController@index');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
