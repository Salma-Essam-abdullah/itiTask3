@include('includes.navbar')

        <div class="container">
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title </label>
                      <input type="title" name="title" class="form-control " id="title" aria-describedby="emailHelp" value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                      <label for="body" class="form-label">body</label>
                      <input type="text" class="form-control" name="body" value="{{ old('body') }}">
                    </div>
                   
                    <div class="mb-3">
                      <label for="enabled" class="form-label">enabled</label>
                      <input type="text" class="form-control" name="enabled" value="{{ old('enabled') }}">
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Post Image</label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                 
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>