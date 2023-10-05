@include('base')
@section('update')




<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
                <h3 style="text-align: center; color: #555;">Book Appointment</h3>
                <div class="box2">
                    <form action="/book" method="POST">
                        @csrf
                        <label for="">Doctor</label>
                        <input type="text" name="doctor" placeholder="Doctor" value="{{$id->doctor}}" readonly>
                        <label for="">Full name</label>
                        <input type="text" name="name" placeholder="Enter your full name" required>
                        <label for="">Time</label>
                        <input type="datetime-local" name="time"  required>
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Enter your email "  required>
                        <label for="">Phone</label>
                        <input type="text" name="phone" placeholder="Enter your phone"  required>
                        <label for="">Address</label>
                        <input type="text" name="address"  placeholder="Enter address" required>
                        <button type="submit" class="btn btn-primary">Make an appointment</button>
                    </form>
                </div>
        </div>
    </div>
</div>


