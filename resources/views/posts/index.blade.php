@extends('layouts.app2')
@section('title', 'Page Title')

@section('content')

<a href="{{route('post.trashed')}}" ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 view deleted posts</button></a>
 
@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Actions</th>
        <th scope="col">User</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
      <tr>

        <td scope="row">{{$post['id']}}</td>
        <td><a href="{{ route('posts.show',$post['id']) }}">{{$post['title']}}</a></td>
        <td scope="row">{{$post['body']}}</td>
      
        <td>
            <form action="{{route('posts.destroy',$post['id']) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('posts.edit',$post['id']) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
            <td>{{$post['user']['name']}}</td>
        {{-- <td>{{$user['name']}}</td> --}}
      </tr>
      
     @endforeach
    
     
      </tr>
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $posts->links()}}
</div>
@endsection





