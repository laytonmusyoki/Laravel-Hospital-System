@include('base')
@section('home')


<div class="box">
    <h2 style="text-align: center; color: #555; padding: 2px 10px; background: white; border-radius: 10px;"><span style="color: red;font-size: 80px;">+</span><span style="color: orange;">DISPENSARY</span></h2>
    
      @if($errors->any())

      @foreach($errors->all() as $msg)

      <div class="alert alert-danger">
      {{$msg}}
      </div>

      @endforeach


      @endif
        

    

    <form action="/register" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Enter Username" value="">
        <input type="email" name="email" placeholder="Enter Email" value="">
        <input type="password" name="password" placeholder="Enter Password" value="">
        <input type="password" name="confirm" placeholder="Confirm Password" value="">
        <!-- <select name="choices" id="">
            <option value="">---Register As---</option>
            <option value="Patient">Patient</option>
            <option value="Doctor">Doctor</option>
        </select> -->
        <button type="submit" class="btn btn-success">Register</button>
    </form>
    <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
</div>