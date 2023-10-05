@include('base')
@section('home')

<style>
    .section{
    background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url("images/hospital.jpg");
    height: 100vh;
    background-size: cover;
    background-position: center;
}
    </style>
    
<div class="section">
    <div class="box1">
        <h1 style="color: aqua; font-size: 45px;">WELCOME TO <span style="color: orange;">KENYATTA <span style="color: red;">HOSPITAL</span> </span> </h1>
        <P style="font-weight: 400; color: white;">Welcome to a leading healthcare facility dedicated to providing exceptional medical care to our patients. Located in Nairobi, Kenya, our hospital is renowned for its state-of-the-art facilities, advanced technology, and a team of highly skilled healthcare professionals.</P>
        <a href="{{url('register')}}">Get Started</a>
    </div>
</div>

