<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Kategori;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO : Return view admin posts management page
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO : Return view admin add post
        return view('admin.pages.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $desc = $request->description;
        $kategori = $request->kategori;
        $tumbnail = $request->tumbnail;
        Post::createPost($title, $desc, $kategori, $tumbnail);

        // TODO : Redirect to admin index post
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris = Kategori::get();
        $post = Post::with('user')
        ->findOrFail($id);
//        return $post;
        return view('pages.post', compact('post', 'kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // TODO : View to edit post
        $post = Post::findOrFail($id);
        return view('admin.pages.edit_post', compact('post'));
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
        $title = $request->title;
        $desc = $request->description;
        $kategori = $request->kategori;
        $tumbnail = $request->tumbnail;
        $id = $post->id;

        $post = Post::updatePost($id, $title, $desc, $kategori, $tumbnail);
        if(!$post){
            // TODO : Return if post not found
            return redirect()->route('admin.post.index');
        }

        // TODO : Return redirect to post index
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::deletePost($id);
        return redirect()->route('admin.post.index');
        // TODO : If post deleted
    }
}
