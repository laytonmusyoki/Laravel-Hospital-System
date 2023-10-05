@include('base')



<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="elements">
                <div class="image" style="display: flex; justify-content:center; align-items:center;">
                    <div class="img" style="width: 150px; height:150px; border-radius:50%; border:2px solid black">
                    
                    </div>
                    <h1>photo</h1>
                </div>
                <p>{{auth()->user()->username}}</p>
                <p>{{auth()->user()->email}}</p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="elements">
            <div class="card-block">
                <form action="/profile"  method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="exampleInputUsername">Username</label>
                            <input class="form-control" id="exampleInputUsername" name="username" readonly 
                                    value="{{auth()->user()->username}}"
                                    aria-describedby="userHelp" placeholder="Enter email">
                        </div>
                    </div>
                    
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label  class="text-danger" 
                                    for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" readonly value="{{auth()->user()->email}}" 
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            
                        </div>
                    </div>                                                
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="fn">First Name</label>
                            <input type="text" name="fname" value=""  class="form-control" id="fn" aria-describedby="emailHelp" required placeholder="Your name">
                        </div>
                        
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="ln">Last Name</label>
                            <input type="text" name="lname" value="" class="form-control" id="ln" required aria-describedby="emailHelp" placeholder="Your last name">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="add">Address</label>
                            <input type="text" name="address" value="" class="form-control" id="add" required aria-describedby="emailHelp" placeholder="Full address here">
                            <small id="addd"  class="form-text text-muted">This is your shipments address</small>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="add">Your profile_image</label>
                            <input type="file" value="" name="image" class="form-control" required id="add" aria-describedby="emailHelp" placeholder="Full address here">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="abt">About Info</label>
                            <textarea type="text"  name="bio" required class="form-control" id="abt" aria-describedby="emailHelp" placeholder="Bio"></textarea>
                            <small id="abf" class="form-text text-muted">We'll show this on your profile.</small>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="form-group">
                            <label for="ln">Phone</label>
                            <input type="phone" name="phone" value="" class="form-control" id="ln" required aria-describedby="emailHelp" placeholder="Your phone number">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 mb-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>                                                
                </form>
                </div>
            </div>
        </div>
    </div>
</div>