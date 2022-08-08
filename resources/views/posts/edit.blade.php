@include('includes.navbar')
<div class="container">
<form method="POST" action="{{ route('posts.update',$posts['id']) }}" >
    @method('PUT')
    @csrf
  
    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control" name="title" value="{{ $posts['title'] }}">
      </div>
    <div class="mb-3">
      <label for="body" class="form-label"   >Body</label>
      <input type="text" name="body" class="form-control" id="body" value="{{ $posts['body'] }}">
    </div>
    <div class="mb-3">
        <label for="enabled" class="form-label"   >Enabled</label>
        <input type="text" name="enabled" class="form-control" id="enabled" value="{{ $posts['enabled'] }}">
      </div>
    
 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>