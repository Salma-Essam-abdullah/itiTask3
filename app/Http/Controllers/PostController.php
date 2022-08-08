<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
       
      $posts = Post::paginate(8);
      return view('posts.index')->with('posts',Post::paginate(8));
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
    public function store(Request $request)
    {
        $request->all();
        $post = new Post([
            'title' => $request->get('title'),
            'body'=> $request->get('body'),
            'enabled'=> $request->get('enabled'),
            
          
        ]);
 
        $post->save();
        return redirect('posts')->with('success', 'post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);

      return view ('posts.show')->with(['posts' => $post, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $posts = Post::find($id); 

      return view ('posts.edit')->with(['posts' => $posts, 'id' => $id]);
        
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
        $request->all();
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->enabled = $request->get('enabled');
 
        $post->update();
 
        return redirect('posts')->with('success', 'Student updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Student deleted successfully');
    
    }
    


    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
      // dd($post);
       return view('posts.softdeleted')->with('posts',$post);
    }

  

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->route('posts.index');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
   
}
