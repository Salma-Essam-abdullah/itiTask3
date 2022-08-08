@extends('layouts.app')
@section('title', 'Page Title')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
        <th scope="row">{{$user['id']}}</th>
        
        <td><a href="{{ route('users.show',$user['id']) }}">{{$user['name']}}</a></td>
        <td>{{$user['email']}}</td>
    
        <td>
            <form action="{{route('users.destroy',$user['id']) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('users.edit',$user['id']) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
      </tr>
      
     @endforeach
    
     
      </tr>
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $users->links()}}
</div>
@endsection
