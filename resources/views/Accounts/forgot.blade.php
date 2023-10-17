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
    
        <form action="/forgot" method="POST">
            @csrf
        <input type="email"name="email" value="" required placeholder="Enter Your email">
        <button class="btn btn-success">Request-Link</button>
    </form>
    <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
</div>