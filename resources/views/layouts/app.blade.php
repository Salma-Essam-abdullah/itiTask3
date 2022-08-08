<html>
 <head>
 <title>App Name - @yield('title')</title>
 </head>
 <body>
 @section('navbar')
 @include('includes.navbar')
 @show
 <div class="container">
 @yield('content')
 </div>
 </body>
</html>
