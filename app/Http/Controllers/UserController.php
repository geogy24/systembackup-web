<?php

namespace App\Http\Controllers;

use Auth;

use App\User;

use App\UserType;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Facades\DropboxFacade;

use App\Facades\UtilFacade;

use App\Http\Requests\StoreUserPostRequest;

use App\Http\Requests\StoreUserPutRequest;

use DB;

use Hash;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['link' => 'usuarios']);
        return view('user.index', ['users' =>  User::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register', ['users_type' => UserType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPostRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'business' => UtilFacade::sanitizeString($request->business),
            'user_type_id' => $request->user_type
        ]);

        if($user && $request->user_type == UserType::clientUser()){
            $this->createFolder($request->business);
        }
        
        return redirect()->action('UserController@index');
    }

    /**
     * Create folder where I found the backup
     * 
     * @return void
     */
    private function createFolder($folderName)
    {
        DropboxFacade::createFolder(UtilFacade::sanitizeString($folderName));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        if($user != null){
            return view('auth.register', ['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserPutRequest $request, $id)
    {
        $this->validate($request, [
            
        ]);
        
        if ($id != null) {
            $user = User::find($id);
        } else {
            $user = User::find(Auth::user()->user_id);
        }
        
        if ($user != null) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        if (Auth::user()->user_type_id == 2) {
            return redirect()->action('BackupController@index');
        } else {
            return redirect()->action('UserController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if ($user->user_type_id == 2){
            DropboxFacade::delete($user->business);
        }
        
        $user->delete();
        
        return redirect()->action('UserController@index');
    }
    
    /**
     * Login in the API way
     */
    public function login(Request $request)
    {
        $finded = false;
        $JSONData = $request->json;
        
        $users = DB::table('users')->where('email', $JSONData['email'])->where('user_type_id', 2)->get();
        
        header('Content-Type: application/json');
        
        foreach ($users as $user) {
            if (Hash::check($JSONData['password'], $user->password)) {
                echo json_encode(array("login" => true, "user_id" => $user->user_id));
                $finded = true;
            }
        }
        
        if (!$finded) {
            echo json_encode(array('login' => false));
        }
    }
}
