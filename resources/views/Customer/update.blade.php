@extends('layout.layout2')
@section('title','Update Customer Information')
@section('my content')

  <div class="container" style="margin-top: 100px; margin-bottom: 100px">
        
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <ul>
                    <li><a href="{{url('customerprofile')}}">Profile Settings</a></li>
                    <form method="POST">   
                    <li><a href="{{url('customerpassupdate/'.$customerlist->id)}}">Update Password</a></li>
                    </form>
                    <li><a href="{{url('mybooking')}}">My Booking</a></li>
                    <li><a href="">Sign Out</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-8">
                @if(session('success'))
                    <h6>{{session('success')}}</h6>
                @endif
                <h1>Update Customer Information</h1>
                <a href="{{ url('customerprofile') }}">Return to profile</a>
                <br>
                <br>
                <form method="post" action="{{ url('customerupdate/'.$customerlist->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" name="txtcName" value="{{$customerlist->name}}" >
                    </div>
                    <div class="form-group">
                        <label>Customer Day of Birth</label>
                        <input type="text" class="form-control" name="txtcDOB" value="{{$customerlist->dob}}" >
                    </div>
                    <div class="form-group">
                        <label>Customer Address</label>
                        <input type="text" class="form-control" name="txtcAdd" value="{{$customerlist->address}}" >
                    </div>
                    <div class="form-group">
                        <label>Customer Phone Number</label>
                        <input type="number" class="form-control" name="txtcPhone" value="{{$customerlist->phone}}" >
                    </div>
                    <div class="form-group">
                        <label>Customer Email</label>
                        <input type="text" class="form-control" name="txtcMail" value="{{$customerlist->email}}" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>  
    </div>
    
@endsection 