@extends('layout.layout2')
@section('title','Update Car Information')
@section('my content')

<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <div class="card bg-light"> <!--card start-->  
                        <div class="card-header">
                            @if(session('status'))
                            <h3 style="color: red" >{{session('status')}}</h3>
                            @endif
                            <h1>EDIT CUSTOMER INFORMATION</h1>
                        </div>
                        <div class="card-body">  
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

                    </div>   <!--card end-->                                    
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection 