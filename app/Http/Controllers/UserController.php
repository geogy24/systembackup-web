<?php

namespace App\Http\Controllers;

use Auth;

use App\User;

use App\UserType;

use Illuminate\Http\Request;

use App\Http\Requests;

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
        $user = User::find(Auth::user()->user_id);
        
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
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->user_id . ',user_id',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $user = User::find(Auth::user()->user_id);
        
        if ($user != null) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        if (Auth::user()->user_type_id == 2) {
            return redirect()->action('BackupController@index');
        } else {
            return redirect()->action('HomeController@index');
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
}
