<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title','base') </title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://kit.fontawesome.com/8a42449199.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky;top: 0;">
        <div class="container-fluid">
          <a class="navbar-brand" href="" style="color: orange;">Hospital</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
               @auth 
               <li class="nav-item">
                  <a class="nav-link active btn btn-primary" aria-current="page" >{{auth()->user()->role}}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
                </li>
                 @else 
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{url('login')}}">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('register')}}">Register</a>
                  </li>
                   @endauth 
              </ul>
          </div>
        </div>
      </nav>


    <!-- navbar end -->

    <script src="bootstrap/js/bootstrap.js"></script>
    @section('content')


    @endsection

</body>
</html>