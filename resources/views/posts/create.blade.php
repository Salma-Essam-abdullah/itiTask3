@include('includes.navbar')

        <div class="container">
        <form method="POST" action="{{route('posts.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title </label>
                      <input type="title" name="title" class="form-control" id="title" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="body" class="form-label">body</label>
                      <input type="text" class="form-control" name="body">
                    </div>
                   
                    <div class="mb-3">
                      <label for="enabled" class="form-label">enabled</label>
                      <input type="text" class="form-control" name="enabled">
                    </div>
                    {{-- <div class="mb-3">
                      <label for="published_at" class="form-label">Published At</label>
                      <input type="date" class="form-control" name="published_at">
                    </div> --}}
                 
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>