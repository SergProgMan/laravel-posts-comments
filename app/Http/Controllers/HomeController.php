<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(20);

        if ($request->ajax()) {
            $view = view('_posts',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('home', compact('posts'));
    }
}
