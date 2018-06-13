<?php

namespace App\Http\Controllers;

use Auth;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
use Alorel\Dropbox\Options\Builder\ListFolderOptions;

class BackupController extends Controller
{
    const DROPBOX_API_TOKEN = 'I7BNS6E3BqAAAAAAAAAACYKPSNRni75LOHPJthUcjs14yK7cXFUI6Qo7HsDKjxDk';

    const BASE_PATH_DROPBOX = '/empresas';

    const UPLOAD_PATH = 'upload/';

    public $months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['link' => 'copias']);
        $user = User::find(Auth::user()->user_id);
        
        if($user != null){
            return view('backup.index', ['files' => $this->_getCopies($user), 'months' => $this->months]);
        } else {
            echo 'Error: usuario no encontrado';
        }
    }
    
    private function _getCopies($users)
    {
        $files = array();
        
        if(is_a($users, "Illuminate\Database\Eloquent\Collection")){
            foreach ($users as $user) {
                array_push($files, ["user" => $user->name,
                                    "user_id" => $user->user_id,
                                    "directory" => base_path() . '/' . self::UPLOAD_PATH . $user->business,
                                    "files" => $this->_getFiles($user)]);
            }
        } else {
            array_push($files, ["user" => $users->name, 
                                "user_id" => $users->user_id,
                                "directory" => base_path() . '/' . self::UPLOAD_PATH . $users->business,
                                "files" => $this->_getFiles($users)]);
        }
        
        return $files;
    }
    
    private function _getFiles($user)
    {
        $directory = base_path() . '/' . self::UPLOAD_PATH . $user->business;

        if (file_exists($directory)) {
            $files = scandir($directory);
        }
        
        return $files;
    }
    
    /**
     * Show copies from all directories
     * 
     * @return view
     * */
    public function showAllCopies()
    {
        echo DropboxApiClass::getFilesFromFolder('hola');
        /*session(['link' => 'copias']);
        $users = User::where('user_type_id','=', 2)->get();

        var_dump($this->_getListCopies($users));
        
        if ($users != null) {
            return view('backup.index', ['files' => $this->_getListCopies($users), 'months' => $this->months]);
        } else {
            echo 'Información: No hay usuarios por mostrar';
        }*/
    }

    private function _getListCopies($users)
    {
        $files = array();
        
        if(is_a($users, "Illuminate\Database\Eloquent\Collection")){
            foreach ($users as $user) {
                array_push($files, ["user" => $user->name,
                                    "user_id" => $user->user_id,
                                    "directory" => base_path() . '/' . self::UPLOAD_PATH . $user->business,
                                    "files" => $this->_getListFiles($user->business)]);
            }
        }

        return $files;
    }

    private function _getListFiles($enterpriseName)
    {
        $listFolder = new ListFolder(false, self::DROPBOX_API_TOKEN);
        $response = $listFolder->raw(self::BASE_PATH_DROPBOX . '/' . $enterpriseName);
        $body = $response->getBody();
        $data = '';

        while(!$body->eof()){
            $data .= $body->read(1024);
        }
        
        $folders = array();

        if ($folderRecursive = json_decode($data, true)) {
            $entries = $folderRecursive['entries'];

            foreach($entries as $entrie) {
                if($entrie['.tag'] == 'file') {
                    array_push($folders, 
                                array(  'name' => $entrie['name'],
                                        'size' => $entrie['size'],
                                        'id'   => $entrie['id'],
                                        'date' => $entrie['server_modified']));
                }
            }
        }

        return $folders;
    }
    
    public function downloadFile(Request $request)
    {
        $user = User::find(Auth::user()->user_id);
        
        if($user != null){
            $directory = base_path() . '/' . self::UPLOAD_PATH . $user->business;
            
            if( file_exists($directory)) {
                // http headers for zip downloads
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=\"" . $request->file_name . "\"");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . filesize($directory . '/' . $request->file_name));
                ob_end_flush();
                @readfile($directory .'/'. $request->file_name);
            } else {
                echo '!exists';
            }
        } else {
            echo 'Error: usuario no encontrado';
        }
    }
    
    public function deleteFile(Request $request)
    {
        $user = User::find($request->user_id);
        
        if($user != null){
            $directory = base_path() . '/' . self::UPLOAD_PATH . $user->business;
            $fileToDeleted = $directory . '/' . $request->file_name;
            
            if(file_exists($fileToDeleted)) {
                if (unlink($fileToDeleted)) {
                    if (Auth::user()->user_type_id == 1) {
                        return redirect()->action('BackupController@showAllCopies');
                    } else {
                        return redirect()->action('BackupController@index');
                    }
                }
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
