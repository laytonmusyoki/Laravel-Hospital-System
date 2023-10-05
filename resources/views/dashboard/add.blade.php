@include('base')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
                <h3 style="text-align: center; color: #555;">ADD SCHEDULE</h3>
                <div class="box2">
                    <form action="/add" method="POST">
                        @csrf
                    <label for="">Day</label>
                    <select name="day" id="">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>
                    <label for="">9am-10am</label>
                    <select name="early" id="">
                        <option value="Available">Available</option>
                        <option value="Booked">Booked</option>
                    </select>
                    <label for="">10:30am-12pm</label>
                    <select name="morning" id="">
                        <option value="Available">Available</option>
                        <option value="Booked">Booked</option>
                    </select>
                    <label for="">1pm-3:30pm</label>
                    <select name="afternoon" id="">
                        <option value="Available">Available</option>
                        <option value="Booked">Booked</option>
                    </select>
                    <label for="">3:30pm-5:00pm</label>
                    <select name="evening" id="">
                        <option value="Available">Available</option>
                        <option value="Booked">Booked</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Add schedule</button>
                </form>
                </div>
        </div>
    </div>
</div>
