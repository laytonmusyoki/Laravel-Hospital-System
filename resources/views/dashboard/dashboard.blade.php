@include('base')


@if(auth()->user()->role=='Patient')


<div class="container">
    @if(session()->has('error'))

        <div class="alert alert-danger alert-dismissible fade show  name" role="alert" >
          <strong> {{session('error')}}</strong>
          <button type="button" class="btn-close name1" data-bs-dismiss="alert" aria-label="close"></button>
        </div>

    @endif

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert" style="margin: 5px auto;">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close name1" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
                <h1 style="text-align: center; color: #555;">My Appointments</h1>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        @foreach($record as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>Dr.{{$row->doctor}}</td>
                            <td>{{$row->time}}</td>
                            <td>
                            @if($row->action=='Approved')
                            <label for="" class="btn btn-success" style="width: 60%; border-radius: 30px;">Approved</label> 
                            @elseif($row->action=='Declined')
                            <label for="" class="btn btn-warning" style="width: 60%; border-radius: 30px;">Declined</label> 
                            @else
                            <label for="" class="btn btn-primary" style="width: 60%; border-radius: 30px;"> Pending...</label>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="elements">
                <h1 style="text-align: center; color: #555;">My Medical History</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>TestName</th>
                            <th>Allergies</th>
                            <th>Medication</th>
                            <th>Test Method</th>
                            <th>Test Cost</th>
                        </tr>
                        @foreach($record as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>
                                @if($row->testname=='null')
                                ---
                                @else
                                {{$row->testname}}
                                @endif
                            </td>
                            <td>
                                @if($row->allergies=='null')
                                ---
                                @else
                                {{$row->allergies}}
                                @endif
                            </td>
                            <td>
                                @if($row->medication=='null')
                                ---
                                @else
                                {{$row->medication}}
                                @endif
                            </td>
                            <td>
                                @if($row->testmethod=='null')
                                ---
                                @else
                                {{$row->testmethod}}
                                @endif
                            </td>
                            <td>
                                @if($row->testcost=='null')
                                ---
                                @else
                                Ksh {{$row->testcost}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
</div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="elements">
                    <h1 style="text-align: center; color: #555;">Doctors' Schedule</h1>
                    <div class="table-responsive">
                    <table class="table table-hover">
                        
                        <tr>
                            <th>Doctor</th>
                            <th>Day</th>
                            <th>9am-10am</th>
                            <th>10:30am-12pm</th>
                            <th>1pm-3:30pm</th>
                            <th>3:30pm-5:00pm</th>
                            <th>Action</th>
                        </tr>
                        @foreach($datas as $row)
                        <tr>
                            <td>{{$row->doctor}}</td>
                            <td>{{$row->day}}</td>
                            <td>{{$row->early}}</td>
                            <td>{{$row->morning}}</td>
                            <td>{{$row->afternoon}}</td>
                            <td>{{$row->evening}}</td>
                            <td><a href="/book/{{$row->id}}" class="btn btn-outline-success">Book Appointment</a></td>
                        </tr>
                        @endforeach
                                                
                    </table>

                </div>
                </div>
            </div>
            
        </div>
        
    </div>




@else 

<h1 style="text-align: center; color: #555;">My appointments</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
            @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert" style="margin: 5px auto;">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close name1" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        @endif
                <div class="table-responsive">
                    
                <table class="table">
                    <tr>
                        <th>Patient_Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Time</th>
                        <th>Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach($row as $record)
                    <tr>
                        <td>{{$record->username}}</td>
                        <td>{{$record->email}}</td>
                        <td>{{$record->phone}}</td>
                        <td>{{$record->time}}</td>
                        <td>{{$record->address}}</td>
                        <td class="text-center">
                            @if($record->action=='Approved')
                            <button class="btn btn-primary" style="padding: 7px 43px;">Approved</button>
                            @elseif($record->action=='Declined')
                            <button class="btn btn-primary" style="padding: 7px 43px;">Declined</button>
                            @else
                            <a href="/approve/{{$record->id}}" class="btn btn-outline-primary">Approve/Decline</a>
                            @endif

                            @if($record->testcost !='null')
                            <button class="btn btn-success" style="padding: 7px 15px;">labtest send</button>
                            @elseif($record->action=='Approved')
                            <a href="/lab/{{$record->id}}" class="btn btn-outline-warning">Send labtest</a>
                            @elseif($record->action=='Declined')
                            <button class="btn btn-success" style="padding: 7px 30px;">Checked</button>
                            @else
                            <button class="btn btn-warning" style="padding: 7px 23px;">Pending</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="d-flex align-items-center justify-content-center" style="margin:5px auto;">
                {{$row->links()}}
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>


<div class="container">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="elements">
                <h3 style="text-align: center; color: #555;">MY SCHEDULE</h3>
    <a href="{{url('add')}}" class="btn btn-outline-success" style="margin-bottom: 20px;">Add schedule</a>
    
                <div class="table-responsive">
                <table class="table  table-hover">
                    <tr>
                        <th>Day</th>
                        <th>9am-10am</th>
                        <th>10:30am-12pm</th>
                        <th>1pm-3:30pm</th>
                        <th>3:30pm-5:00pm</th>
                        <th class="text-center">Action</th>
                    </tr>
                   @foreach($data as $data)
                    <tr>
                        <td>{{$data->day}}</td>
                        <td>{{$data->early}}</td>
                        <td>{{$data->morning}}</td>
                        <td>{{$data->afternoon}}</td>
                        <td>{{$data->evening}}</td>
                        <td class="text-center"><a href="/update/{{$data->id}}" class="btn btn-primary" style="padding: 7px 35px;">Update</a>
                        <a href="/delete/{{$data->id}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-danger"style="padding: 7px 35px;">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                
                </table>
             
            </div>
            </div>
        </div>
    </div>
</div>


@endif