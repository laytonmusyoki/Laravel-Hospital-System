@include('base')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
                <h3 style="text-align: center;color: #555;">Lab Results</h3>
                <div class="box2">
                    <form class="row g-3" action="/lab/{{$id->id}}" method="POST" >
                        @csrf
                          <div class="col-md-6">
                             
                            <label for="inputText4" class="form-label">Test Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter test name" name="name" required  value="">
                          </div>
                          <div class="col-md-6">
                             
                            <label for="inputText4" class="form-label">Patient_Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name=""  value="{{$id->name}}" readonly>
                          </div>
                          <div class="col-md-6">
                             
                            <label for="inputText4" class="form-label">Allergies</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Any Allergies" name="allergies" required  value="">
                          </div>
                          <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Medication</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Medication"  name="medication" required value="">
                          </div>
                         
                          <div class="col-12">
                            <label for="inputAddress" class="form-label">Test Method</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Test Method" name="method" required value="">
                          </div>
                          <div class="col-12">
                            <label for="inputAddress2" class="form-label">Test Cost</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Test Cost" name="cost" required value="">
                          </div>
                          
                          
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

