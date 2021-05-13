<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Fav;

class FavsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function favs($id) {
        Fav::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);
        
        session()->flash('status', 'You favorited the Post.');
        
        return redirect()->back();
    }
    
    public function unfavs($id) {
        $fav = Fav::where('post_id', $id)->where('user_id', Auth::id())->first();
        $fav->delete();
        
        session()->flash('success', 'You Unliked the Post.');
        
        return redirect()->back();
    }
}
