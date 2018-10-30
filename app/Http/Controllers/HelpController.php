<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Help;

use App\Http\Requests;

use DB;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['link' => 'ayuda']);
        
        return view('help.index');
    }
}
