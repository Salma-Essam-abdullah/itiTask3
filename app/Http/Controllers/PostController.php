<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $user = User::find(2);
    //     $user->posts()->saveMany([
    //         new Post(['title'=>'title_1', 'body'=>'data_1','enabled'=>true]),
    //         new Post(['title'=>'title_2', 'body'=>'data_2','enabled'=>true]),
    //         new Post(['title'=>'title_2', 'body'=>'data_2','enabled'=>true]),
    //     ]);
    // $user = User::find('users');

   
    $posts = POST::paginate(8);
    return view('posts.index')->with(['posts'=>$posts]);
    
    // $posts = Post::paginate(10);
    // return view('posts.index')->with(['posts' => $posts]);


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
    public function store(StoreUser $request)
    {
        $input =  $request->all();
        if($request->file('image')->isValid()){
            $path = $request->file('image')->store('public/images');
            $input['image'] = basename($path);
        }

        $user = Auth::user();
        $user->posts()->create($input);
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

      return view ('posts.show')->with(['posts' => $post]);
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

      //  $user= Auth::user();
      // if ($user->id === $posts->user_id) {
        return view ('posts.edit')->with(['posts' => $posts]);
    
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
    { 
    
    $posts = Post::find($id); 
  
      
        $data = $request->only(['title', 'body','enabled']);
   $posts->update($data);
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
