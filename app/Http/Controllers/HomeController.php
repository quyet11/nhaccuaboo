<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Music;
class HomeController extends Controller
{
    public function index()
    {
        $music=Music::paginate(3);
        return view('home.userpage',compact('music'));
    }
    public function redirect()
    {
        $usertype= Auth::user()->usertype;
        if ($usertype=="1"){
            return view('admin.home');
        }
        else{
            $music=Music::paginate(3);
        return view('home.userpage',compact('music'));
        }
    }
    public function listen($id){
        $music = music::find($id);
        return view('home.listen',compact('music'));

    }



}
