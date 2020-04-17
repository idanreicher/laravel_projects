<?php

namespace App\Http\Controllers;

use App\Http\Requests\post\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('posts.index')->with('posts' , Post::all());
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        $image = $request->image->store('posts');
        //dd($image);
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'content' => $request->content,
            'created_at' => $request->created_at
        ]);

        session()->flash('success' , 'post created');

        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post' , $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only('title', 'description', 'content', 'created_at');

        if($request->hasFile('image')){

            $image = $request->image->store('posts');

            $post->deleteImage();

            $data['image'] = $image;

        }

        $post->update($data);

        session()->flash('success', 'Post updated successfully');

        return redirect(route('posts.index'));
    }

    /**
     * display all trashed posts
     */
    public function trashed(Post $post)
    {
       $trashed = $post->onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed()){

            $post->deleteImage();

            $post->forceDelete();

        }else{

            $post->delete();
        }

        session()->flash('success' , 'post trashed successfully');

        return redirect(route('posts.index'));
    }

    public function restore($id){

        $post = Post::withTrashed()->where('id' , $id)->firstOrFail();

        $post->restore();

        session()->flush('success' , 'session restored successfuly.');

        return redirect()->back();


    }
}
