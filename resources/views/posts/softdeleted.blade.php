@extends('layouts.app2')

@section('content')






<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts soft deleted</div>

                <div class="card-body">
 

                        @if ($posts->count()>0)
                        <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col"> id </th>
                                    <th scope="col"> Title </th>
                                    
                                    <th scope="col"> Body </th>
                                    
                                   <th scope="col">Restore</th>
                                   {{--    <th scope="col">Delete</th>  --}}
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                 
                                 @foreach ($posts as $post)
                                 <tr>
                                  <th scope="row">{{$post->id}}</th>
                                         <th scope="row">{{$post->title}}</th>
                                         <th scope="row">{{$post->body}}</th>
                                         <td> 
                                                <a class="" href="{{route('post.restore',['id' =>$post->id ])}}">  
                                                     <i class="fas fa-edit"></i>
                                              </a>  
                                         </td>
                                         <td> 
                                         <a class="" href="{{route('post.restore',['id' =>$post->id ])}}">
                                                <button type="button" class="btn btn-success">
                                                  Restore
                                                </button>
                                         </a>
                                        </td> 
                                       </tr>
                                 @endforeach
                                  
                                 @else
                                  
                                         
                                        <p scope="row" class="text-center">No trashed posts</p>
                                         
                                       
                                      
                                 @endif
                                 
                                  
                                </tbody>
                              </table>




                     

                </div>
            </div>
        </div>
    </div>
</div>
@endsection