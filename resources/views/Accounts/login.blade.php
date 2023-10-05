@include('base')
@section('home')


<div class="box">
    <h2 style="text-align: center; color: #555; padding: 2px 10px; background: white; border-radius: 10px;"><span style="color: red;font-size: 80px;">+</span><span style="color: orange;">DISPENSARY</span></h2>
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert" style="margin: 5px auto;">
                <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close name1" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif
        <!-- displaying success messages -->
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert" style="margin: 5px auto;">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close name1" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif
    
        <form action="/login" method="POST">
            @csrf
        <input type="text"name="username" value="" required placeholder="Enter Username">
        <input type="password" name="password" value="" required placeholder="Enter Password">
        <button class="btn btn-success">Login</button>
    </form>
    <p>Don't have an account? <a href="{{url('register')}}">Register</a></p>
</div>