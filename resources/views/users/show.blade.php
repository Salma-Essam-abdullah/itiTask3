@extends('layouts.app2')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show user</h2>
            </div>
           
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $users['id'] }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $users['name'] }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $users['email'] }}
            </div>
        </div>
        <div class="pull-right">
            <strong>Title Of your posts:</strong>
            @foreach($posts as $post)
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      
                        {{$post['title']}}
                    </div>
                </div>
              
           
             <br>
              
                @endforeach
    
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
       
    </div>
@endsection