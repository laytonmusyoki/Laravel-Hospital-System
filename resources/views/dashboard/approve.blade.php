@include('base')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
                <h3 style="text-align: center;color: #555;">Approve appointment</h3>
                <div class="box2">
                    <form action="/approve/{{$id->id}}" method="POST">
                        @csrf
                        <label for="">Patient_Name</label>
                        <input type="text" value="{{$id->name}}" readonly placeholder="Patient_Name">
                        <label for="">Patient_Email</label>
                        <input type="text" value="{{$id->email}}" readonly placeholder="Recepient Email">
                        <label for="">Action</label>
                        <select name="action" id="">
                            <option value="Approved">Approved</option>
                            <option value="Declined">Declined</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

