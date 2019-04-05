<?php

namespace App\Http\Controllers\BackOffice;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $posts=$user->posts()->latest()->paginate(15);
        return view('backOffice.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backOffice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
        ]);

        $post = new Post;
        $post->fill($request->all());

        $user = Auth::user();
        $post->user()->associate($user);

        $post->save();

        return redirect(route('back-office.posts.index'))
            ->with(['status' => 'Post created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('backOffice.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($post->user_id == Auth::user()->id){
            $request->validate([
                'title' => 'required|max:255|string',
                'content' => 'required|string',
            ]);
            
            $post->fill($request->all());

            $post->save();

            return redirect(route('back-office.posts.index'))
                ->with(['status' => 'Post updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->user_id == Auth::user()->id){
            $post->delete();
            return redirect(route('back-office.posts.index'))
            ->with(['status' => 'Post deleted!']);
        }
    }
}
