<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MyController extends Controller
{
    /**
    public function __construct()
    {
        $this->middleware('auth');
    }
     */
    public function alluser()
    {
        $user = User::take(1000)->get();
        return response()->json($user);
    }

    public function getUserName($name)
    {
        $user = User::where('name','like','%'.$name.'%')->take(1000)->get();
        return response()->json($user);
    }

}
