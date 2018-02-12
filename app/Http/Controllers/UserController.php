<?php

namespace App\Http\Controllers;

use Auth;

use App\User;

use App\UserType;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Hash;

class UserController extends Controller
{
    
    const UPLOAD_PATH = 'upload/';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['link' => 'usuarios']);
        $users = User::All();
        
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersType = UserType::all();
        
        return view('auth.register', ['users_type' => $usersType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'business' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'user_type' => 'required'
        ]);
        
        if($request->user_type == 2){
            $this->makeNewDirectory($request->business);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->business = $request->business;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_type_id = $request->user_type;
        $user->save();
        
        return redirect()->action('UserController@index');
    }
    
    private function makeNewDirectory($name)
    {
        $directory = base_path() . '/' . self::UPLOAD_PATH . $name;
        
        mkdir($directory);
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
        $user = User::find($id);
        
        if($user != null){
            return view('auth.register', ['user' => $user]);
        } else {
            
        }
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . (($id != null) ? $id : Auth::user()->user_id) . ',user_id',
            'password' => 'required|min:6|confirmed',
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
            $this->deleteDirectory($user->business);
        }
        
        $user->delete();
        
        return redirect()->action('UserController@index');
    }
    
    private function deleteDirectory($name)
    {
        $directory = base_path() . '/' . self::UPLOAD_PATH . $name;
        
        rmdir($directory);
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
