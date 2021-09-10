@extends('layout.layout2')
@section('title','Update Customer Information')
@section('my content')

  <div class="container" style="margin-top: 100px; margin-bottom: 100px">
        
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <ul>
                    <li><a href="{{url('customerindex')}}">Profile Settings</a></li>
                    <form method="POST">
                        @foreach($customerlist as $list)
                        <li><a href="{{url('customerpassupdate/'.$list->CusID)}}">Update Password</a></li>
                        @endforeach
                    </form>
                    <li><a href="">My Booking</a></li>
                    <li><a href="{{url('feedbackindex')}}">Feedback</a></li>
                    <li><a href="">Sign Out</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-8">
                @if(session('success'))
                    <h6>{{session('success')}}</h6>
                @endif
                <h1>Update Customer Information</h1>
                <a href="{{ url('customerindex') }}">Return to index</a>
                <br>
                <br>
                @foreach($customerlist as $list)
                <form method="post" action="{{ url('customerupdate/'.$customerlist->CusID) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <div class="form-group">
                        <label>Customer Password</label>
                        <input type="text" class="form-control" name="txtcPass" value="{{$customerlist->CusPass}}" >
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="text" class="form-control" name="txtcName" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                @endforeach
            </div>
        </div>  
    </div>
    
@endsection 