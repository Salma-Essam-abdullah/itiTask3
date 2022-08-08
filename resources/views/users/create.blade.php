

        @include('includes.navbar')
<div class="container">
<form method="POST" action="{{route('users.store')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">password</label>
              <input type="password" class="form-control" name="password">
            </div>
         
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>